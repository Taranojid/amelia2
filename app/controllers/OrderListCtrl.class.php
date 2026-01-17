<?php
namespace app\controllers;

use core\App;
use core\Utils;           
use core\ParamUtils;
use core\SessionUtils;

class OrderListCtrl {

    // LISTA ZAMÓWIEŃ (Dla Pracownika/Admina)
    public function action_orderList() {
        $orders = App::getDB()->select("orders", [
            "[>]users" => ["USERS_id_user2" => "id_user"]
        ], [
            "orders.orders_id",
            "orders.data_zamowienia",
            "orders.koszt_zamowienia",
            "orders.adres_dostawy",
            "orders.status",
            "users.login"
        ], [
            "ORDER" => ["orders.data_zamowienia" => "DESC"]
        ]);

        $user = SessionUtils::loadObject('user', true);
        
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('orders', $orders);
        App::getSmarty()->display('OrderList.tpl');
    }

    // HISTORIA ZAMÓWIEŃ (Dla Klienta)
    public function action_orderHistory() {
        $user = SessionUtils::loadObject('user', true);
        
        if (!$user) {
            Utils::addErrorMessage("Musisz być zalogowany.");
            App::getRouter()->redirectTo("login");
            return;
        }
        
        $userId = App::getDB()->get("users", "id_user", ["login" => $user->login]);
        
        $orders = App::getDB()->select("orders", "*", [
            "USERS_id_user2" => $userId,
            "ORDER" => ["data_zamowienia" => "DESC"]
        ]);

        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('orders', $orders);
        App::getSmarty()->display('OrderHistory.tpl'); 
    }

    // SZCZEGÓŁY ZAMÓWIENIA
    public function action_orderDetails() {
        $orderId = ParamUtils::getFromRequest('id');

        if (!$orderId) {
            Utils::addErrorMessage("Błędny numer zamówienia.");
            App::getRouter()->redirectTo("orderList");
            return;
        }

        $items = App::getDB()->select("order_items", [
            "[>]products" => ["PRODUCTS_id_product" => "id_product"]
        ], [
            "products.nazwa_produktu",
            "order_items.cena_zakupu",
            "order_items.ilosc"
        ], [
            "order_items.ORDERS_ORDERS_ID" => $orderId
        ]);

        $orderInfo = App::getDB()->get("orders", "*", [
            "orders_id" => $orderId // Poprawione z "id" na "orders_id"
        ]);

        $user = SessionUtils::loadObject('user', true);

        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('items', $items);
        App::getSmarty()->assign('orderInfo', $orderInfo);
        App::getSmarty()->display('OrderDetails.tpl');
    }

    // OZNACZ JAKO WYSŁANE
    public function action_orderShip() {
        // 1. Pobierz ID zamówienia z żądania
        $id = ParamUtils::getFromRequest('id');
        
        // 2. Pobierz ID zalogowanego użytkownika (pracownika)
        $user = SessionUtils::loadObject('user', true);
        $userId = App::getDB()->get("users", "id_user", ["login" => $user->login]);

        if (isset($id) && is_numeric($id)) {
            App::getDB()->update("orders", [
                "ORDER_STATUS_id_status" => 2,
                "status" => "wysłane",
                "modyfikowane_przez" => $userId,
                "kiedy_modifikowane" => date("Y-m-d H:i:s")
            ], [
                "orders_id" => $id // Klucz główny to orders_id
            ]);
            
            Utils::addInfoMessage("Zamówienie nr $id oznaczone jako wysłane.");
        } else {
            Utils::addErrorMessage("Niepoprawne ID zamówienia.");
        }
        
        App::getRouter()->redirectTo("orderList");
    }
}