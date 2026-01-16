<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;

class ProductEditCtrl {
    private $form = [];

    // Wyświetlenie pustego formularza (już masz)
    public function action_productNew() {
        $categories = App::getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        App::getSmarty()->assign('categories', $categories);
        $this->generateView();
    }

    // Wczytanie danych istniejącego produktu do edycji
    public function action_productEdit() {
        // 1. Pobierz ID produktu z URL
        $id = ParamUtils::getFromRequest('id');

        // 2. Pobierz dane tego produktu z bazy
        $this->form = App::getDB()->get("PRODUCTS", "*", ["id_product" => $id]);

        // 3. Pobierz kategorie
        $categories = App::getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        
        App::getSmarty()->assign('categories', $categories);
        $this->generateView();
    }

    public function action_productSave() {
        // 1. Pobierz dane
        $id = ParamUtils::getFromRequest('id_product'); // ukryte pole w formularzu
        $this->form['nazwa'] = ParamUtils::getFromRequest('nazwa_produktu');
        $this->form['cena'] = ParamUtils::getFromRequest('cena');
        $this->form['opis'] = ParamUtils::getFromRequest('opis');
        $this->form['id_kat'] = ParamUtils::getFromRequest('id_kategorii');
        $userId = $_SESSION['_id_user'] ?? null;

        $data = [
            "CATEGORIES_id_category" => $this->form['id_kat'],
            "nazwa_produktu" => $this->form['nazwa'],
            "cena" => $this->form['cena'],
            "opis" => $this->form['opis'],
            "modyfikowane_przez" => $userId,
            "kiedy_modyfikowane" => date("Y-m-d H:i:s")
        ];

        // 2. Wybór: UPDATE czy INSERT
        if (empty($id)) {
            // Nowy produkt
            $data["czy_aktywny"] = 1;
            $data["utworzone_przez"] = $userId;
            App::getDB()->insert("PRODUCTS", $data);
            App::getMessages()->addInfo('Dodano nowy produkt');
        } else {
            // Edycja istniejącego
            App::getDB()->update("PRODUCTS", $data, ["id_product" => $id]);
            App::getMessages()->addInfo('Zaktualizowano produkt');
        }

        header("Location: ".App::getConf()->app_url."/ctrl.php?action=productList");
    }
        public function action_productDelete() {
    $id = ParamUtils::getFromRequest('id');
    $userId = $_SESSION['_id_user'] ?? null;

    if (isset($id)) {
        App::getDB()->update("PRODUCTS", [
            "czy_aktywny" => 0,
            "modyfikowane_przez" => $userId,
            "kiedy_modyfikowane" => date("Y-m-d H:i:s")
        ], [ "id_product" => $id ]);

        App::getMessages()->addInfo('Produkt został wycofany ze sprzedaży');
    }
    header("Location: ".App::getConf()->app_url."/ctrl.php?action=productList");
    }
    

    private function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('ProductEdit.tpl');
    }
}