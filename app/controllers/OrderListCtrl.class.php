<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;

class OrderListCtrl {

    // TWOJA ISTNIEJĄCA AKCJA (Dla Pracownika/Admina)
    public function action_orderList() {
        $orders = App::getDB()->select("ORDERS", [
            "[>]USERS" => ["USERS_id_user2" => "id_user"]
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
        // Pobieramy ID z sesji
        $userId = $_SESSION['_id_user'] ?? null;

        if (!$userId) {
            App::getRouter()->redirectTo("login");
            return;
        }

        // Pobieramy tylko zamówienia przypisane do tego ID
        $orders = App::getDB()->select("ORDERS", "*", [
            "USERS_id_user2" => $userId,
            "ORDER" => ["data_zamowienia" => "DESC"]
        ]);

        App::getSmarty()->assign('orders', $orders);
        // Możemy użyć dedykowanego szablonu dla klienta (czyściej) 
        // lub tego samego co pracownik z if-ami
        App::getSmarty()->display('OrderHistory.tpl'); 
    }

    public function action_orderDetails() {
    $orderId = ParamUtils::getFromRequest('id');

    if (!$orderId) {
        App::getMessages()->addError("Błędny numer zamówienia.");
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
        $id = ParamUtils::getFromRequest('id');
        if (isset($id) && is_numeric($id) && $id > 0) {
            App::getDB()->update("ORDERS", [
                "status" => "wysłane",
                "modyfikowane_przez" => $_SESSION['_id_user']
            ], [
                "ORDERS_ID" => $id
            ]);
            App::getMessages()->addInfo("Zamówienie nr $id wysłane.");
        }
        header("Location: ".App::getConf()->app_url."/ctrl.php?action=orderList");
    }
}