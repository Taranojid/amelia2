<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class CartCtrl {

    public function action_cartAdd() {
        // 1. Pobranie ID
        $id = ParamUtils::getFromRequest('id');

        if (empty($id) || !is_numeric($id) || $id <= 0) {
            Utils::addErrorMessage('Nieprawidłowy ID produktu');
            App::getRouter()->redirectTo("productList");
        }

        // 2. Sprawdzenie czy produkt istnieje
        $product = App::getDB()->get("PRODUCTS", "id_product", ["id_product" => $id]);
        if (!$product) {
            Utils::addErrorMessage('Produkt nie istnieje');
            App::getRouter()->redirectTo("productList");
        }

        // 3. Zarządzanie koszykiem przez sesję Amelii
        $cart = SessionUtils::loadObject('cart', true);
        if ($cart == null) $cart = [];

        if (!isset($cart[$id])) {
            $cart[$id] = 1;
            Utils::addInfoMessage('Mydło dodane do koszyka!');
        } else {
            $cart[$id]++;
            Utils::addInfoMessage('Zwiększono ilość w koszyku.');
        }

        SessionUtils::storeObject('cart', $cart);

        // 4. Przekierowanie z powrotem do listy produktów
        App::getRouter()->redirectTo("productList");  // ← ZMIENIONE
    }

    public function action_orderSave() {
        $adres = ParamUtils:: getFromRequest('adres');
        $cart = SessionUtils::loadObject('cart', true);
        
        // Pobieramy usera z sesji Amelii
        $user = SessionUtils::loadObject('user', true);
        $userId = ($user) ? $user->id_user : null; 

        if (empty($userId)) {
            Utils::addErrorMessage("Musisz być zalogowany, aby złożyć zamówienie.");
            App::getRouter()->redirectTo("login");
        }

        if (empty($cart)) {
            Utils:: addErrorMessage("Twój koszyk jest pusty!");
            App::getRouter()->redirectTo("productList");
        }

        if (empty($adres)) {
            Utils::addErrorMessage("Proszę podać adres dostawy.");
            $this->action_cartView();
            return;
        }

        try {
            $ids = array_keys($cart);
            $products = App::getDB()->select("PRODUCTS", ["id_product", "cena"], ["id_product" => $ids]);
            
            $total = 0;
            foreach ($products as $p) {
                $total += $p['cena'] * $cart[$p['id_product']];
            }

            // Transakcja w bazie danych
            App::getDB()->insert("ORDERS", [
                "USERS_id_user2" => $userId,
                "data_zamowienia" => date("Y-m-d H:i:s"),
                "koszt_zamowienia" => $total,
                "adres_dostawy" => $adres,
                "status" => "nowe"
            ]);

            $orderId = App::getDB()->id();

            foreach ($products as $p) {
    App::getDB()->insert("ORDER_ITEMS", [
        "ORDERS_ORDERS_ID" => $orderId,
        "PRODUCTS_id_product" => $p['id_product'],  // ← Zmień ] na ,
        "ilosc" => $cart[$p['id_product']],
        "cena_zakupu" => $p['cena']
    ]);
}

            // Czyścimy koszyk
            SessionUtils::remove('cart');
            
            Utils::addInfoMessage("Dziękujemy!  Zamówienie nr $orderId zostało złożone.");
            App::getRouter()->redirectTo("orderHistory");

        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd zapisu: " . $e->getMessage());
            $this->action_cartView();
        }
    }

    public function action_cartView() {
        // Standaryzacja ładowania danych
        $cart = SessionUtils::loadObject('cart', true);
        $products = [];
        $total = 0;

        if (! empty($cart)) {
            $ids = array_keys($cart);
            $products = App::getDB()->select("PRODUCTS", "*", ["id_product" => $ids]);

            foreach ($products as &$p) {
                $p['quantity'] = $cart[$p['id_product']];
                $total += $p['cena'] * $p['quantity'];
            }
        }

        // Przekazujemy dane niezbędne dla main.tpl
        App::getSmarty()->assign('user', SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('isKlient', \core\RoleUtils::inRole('klient'));

        App::getSmarty()->assign('cart_products', $products);
        App::getSmarty()->assign('total', $total);
        App::getSmarty()->display('CartView.tpl');
    }

    public function action_cartClear() {
        SessionUtils::remove('cart');
        Utils::addInfoMessage('Koszyk został opróżniony.');
        App::getRouter()->redirectTo("productList");
    }
}