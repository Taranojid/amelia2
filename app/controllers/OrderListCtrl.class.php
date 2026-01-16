<?php
namespace app\controllers;

use core\App;
use core\Utils;           
use core\ParamUtils;
use core\SessionUtils;

class OrderListCtrl {

    // TWOJA ISTNIEJĄCA AKCJA (Dla Pracownika/Admina)
    public function action_orderList() {
    // Proste zapytanie z JOIN
    $orders = App::getDB()->select("ORDERS", [
        "[>]USERS" => ["USERS_id_user2" => "id_user"]  // Klucz obcy → klucz główny
    ], [
        "ORDERS.ORDERS_ID",
        "ORDERS.data_zamowienia",
        "ORDERS.koszt_zamowienia",
        "ORDERS.adres_dostawy",
        "ORDERS.status",
        "USERS.login"
    ], [
        "ORDER" => ["ORDERS.data_zamowienia" => "DESC"]
    ]);

    App::getSmarty()->assign('orders', $orders);
    App::getSmarty()->display('OrderList.tpl');
}

    // NOWA AKCJA W TYM SAMYM KONTROLERZE (Dla Klienta)
    public function action_orderHistory() {
    $user = SessionUtils::loadObject('user', true);
    
    if (!$user) {
        Utils::addErrorMessage("Musisz być zalogowany, aby zobaczyć historię zamówień.");
        App::getRouter()->redirectTo("login");
        return;
    }
    
    // Pobierz ID z bazy na podstawie loginu
    $userData = App::getDB()->get("USERS", "id_user", ["login" => $user->login]);
    $userId = $userData ??  null;
    
    if (! $userId) {
        Utils::addErrorMessage("Nie znaleziono użytkownika.");
        App::getRouter()->redirectTo("login");
        return;
    }

    // Pobieramy tylko zamówienia przypisane do tego ID
    $orders = App::getDB()->select("ORDERS", "*", [
        "USERS_id_user2" => $userId,
        "ORDER" => ["data_zamowienia" => "DESC"]
    ]);

    App::getSmarty()->assign('orders', $orders);
    App::getSmarty()->display('OrderHistory.tpl'); 
}
    
    // ...  reszta kodu


    public function action_orderDetails() {
        $orderId = ParamUtils:: getFromRequest('id');

        if (!$orderId) {
            Utils::addErrorMessage("Błędny numer zamówienia.");
            App::getRouter()->redirectTo("orderHistory");
            return;
        }

        // Używamy nazwy: order_items
        $items = App::getDB()->select("order_items", [
            "[>]PRODUCTS" => ["PRODUCTS_id_product" => "id_product"]
        ], [
            "PRODUCTS.nazwa_produktu",
            "order_items.cena_zakupu",
            "order_items.ilosc"
        ], [
            "order_items.ORDERS_ORDERS_ID" => $orderId
        ]);

        $orderInfo = App::getDB()->get("ORDERS", "*", [
            "ORDERS_ID" => $orderId
        ]);

        App::getSmarty()->assign('items', $items);
        App::getSmarty()->assign('orderInfo', $orderInfo);
        App::getSmarty()->display('OrderDetails.tpl');
    }

    // TWOJA ISTNIEJĄCA AKCJA WYSYŁKI
    public function action_orderShip() {
        $user = SessionUtils::loadObject('user', true);
        $userId = ($user) ? $user->id_user :  null;

        $id = ParamUtils::getFromRequest('id');
        if (isset($id) && is_numeric($id) && $id > 0) {
            App::getDB()->update("ORDERS", [
                "status" => "wysłane",
                "modyfikowane_przez" => $userId  // ← Zmienione z ; na ,
            ], [
                "ORDERS_ID" => $id
            ]);
            Utils::addInfoMessage("Zamówienie nr $id wysłane.");  // ← Zmienione z App::getMessages()->addInfo
        }
        App::getRouter()->redirectTo("orderList");  // ← Zmienione z header() na redirectTo()
    }
}