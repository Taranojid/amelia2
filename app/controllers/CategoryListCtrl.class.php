<?php
namespace app\controllers;

use core\App;
use core\Utils;        // ← DODAJ TO
use core\ParamUtils;

class CategoryListCtrl {
    
    public function action_categoryList() {
        $categories = App:: getDB()->select("CATEGORIES", "*");
        
        App:: getSmarty()->assign('categories', $categories);
        App::getSmarty()->display('CategoryList.tpl');  // ← Usuń 'msgs', niepotrzebne
    }

    public function action_categorySave() {
        $nazwa = ParamUtils::getFromRequest('nazwa_kategorii');

        if (isset($nazwa) && strlen($nazwa) > 2) {
            // Klucz w tablicy musi pasować do kolumny w bazie: 'nazwa_kategori'
            App::getDB()->insert("CATEGORIES", [
                "nazwa_kategori" => $nazwa 
            ]);
            Utils::addInfoMessage("Dodano nową kategorię:  " . $nazwa);  // ← ZMIENIONE
        } else {
            Utils::addErrorMessage("Nazwa kategorii musi mieć min.  3 znaki.");  // ← ZMIENIONE
        }

        App::getRouter()->redirectTo("categoryList");
    }

    public function action_categoryDelete() {
        $id = ParamUtils::getFromRequest('id');

        if (isset($id)) {
            // Sprawdzamy, czy jakieś mydła nie są przypisane do tej kategorii
            $count = App::getDB()->count("PRODUCTS", ["CATEGORIES_id_category" => $id]);  // ← POPRAWIONA NAZWA KOLUMNY
            
            if ($count == 0) {
                App::getDB()->delete("CATEGORIES", ["id_category" => $id]);
                Utils:: addInfoMessage("Kategoria została usunięta.");  // ← ZMIENIONE
            } else {
                Utils::addErrorMessage("Nie można usunąć kategorii, do której są przypisane produkty!");  // ← ZMIENIONE
            }
        }

        App::getRouter()->redirectTo("categoryList");
    }
}