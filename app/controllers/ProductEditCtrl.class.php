<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class ProductEditCtrl {
    private $form = [];

    // Wyświetlenie pustego formularza
    public function action_productNew() {
        $categories = App:: getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign('form', (object) $this->form);  // ← DODAJ TO
        App::getSmarty()->display('ProductEdit.tpl');  // ← DODAJ TO
    }

    // Wczytanie danych istniejącego produktu do edycji
    public function action_productEdit() {
        // 1. Pobierz ID produktu z URL
        $id = ParamUtils::getFromRequest('id');

        if (! $id) {
            Utils::addErrorMessage("Nie podano ID produktu.");
            App::getRouter()->redirectTo("productList");
            return;
        }

        // 2. Pobierz dane tego produktu z bazy
        $this->form = App::getDB()->get("PRODUCTS", "*", ["id_product" => $id]);

        if (!$this->form) {
            Utils::addErrorMessage("Nie znaleziono produktu o ID: $id");
            App::getRouter()->redirectTo("productList");
            return;
        }

        // 3. Pobierz kategorie
        $categories = App::getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign('form', (object) $this->form);  // ← WAŻNE! Rzutowanie na obiekt
        App::getSmarty()->display('ProductEdit.tpl');  // ← DODAJ TO
    }

    public function action_productSave() {
        // 1. Pobierz dane
        $id = ParamUtils::getFromRequest('id_product');
        $this->form['nazwa'] = ParamUtils::getFromRequest('nazwa_produktu');
        $this->form['cena'] = ParamUtils::getFromRequest('cena');
        $this->form['opis'] = ParamUtils::getFromRequest('opis');
        $this->form['id_kat'] = ParamUtils::getFromRequest('id_kategorii');
        
        // Pobierz userId z sesji Amelii
        $user = SessionUtils::loadObject('user', true);
        $userId = ($user) ? $user->id_user : null;

        $data = [
            "CATEGORIES_id_category" => $this->form['id_kat'],
            "nazwa_produktu" => $this->form['nazwa'],
            "cena" => $this->form['cena'],
            "opis" => $this->form['opis'],
            "modyfikowane_przez" => $userId,
            "kiedy_modyfikowane" => date("Y-m-d H: i:s")
        ];

        // 2. Wybór: UPDATE czy INSERT
        if (empty($id)) {
            // Nowy produkt
            $data["czy_aktywny"] = 1;
            $data["utworzone_przez"] = $userId;
            App::getDB()->insert("PRODUCTS", $data);
            Utils::addInfoMessage('Dodano nowy produkt');
        } else {
            // Edycja istniejącego
            App::getDB()->update("PRODUCTS", $data, ["id_product" => $id]);
            Utils::addInfoMessage('Zaktualizowano produkt');
        }

        App::getRouter()->redirectTo("productList");
    }

    public function action_productDelete() {
        $id = ParamUtils::getFromRequest('id');
        
        // Pobierz userId z sesji Amelii
        $user = SessionUtils::loadObject('user', true);
        $userId = ($user) ? $user->id_user : null;

        if (isset($id)) {
            App::getDB()->update("PRODUCTS", [
                "czy_aktywny" => 0,
                "modyfikowane_przez" => $userId,
                "kiedy_modyfikowane" => date("Y-m-d H: i:s")
            ], [
                "id_product" => $id
            ]);
            Utils::addInfoMessage("Produkt został usunięty (dezaktywowany).");
        }

        App::getRouter()->redirectTo("productList");
    }
}