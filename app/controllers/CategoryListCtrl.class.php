<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;      // ← DODAJ TO

class CategoryListCtrl {
    
    public function action_categoryList() {
        // Pobierz kategorie
        $categories = App::getDB()->select("CATEGORIES", "*");
        
        // Sprawdź role użytkownika
        $isPracownik = RoleUtils:: inRole('pracownik');
        $isAdmin = RoleUtils::inRole('admin');
        
        // Przypisz do Smarty
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign('isPracownik', $isPracownik || $isAdmin);  // Admin też ma dostęp
        App::getSmarty()->assign('isAdmin', $isAdmin);
        
        App::getSmarty()->display('CategoryList.tpl');
    }

    public function action_categorySave() {
        $nazwa = ParamUtils::getFromRequest('nazwa_kategorii');

        if (isset($nazwa) && strlen($nazwa) > 2) {
            App::getDB()->insert("CATEGORIES", [
                "nazwa_kategori" => $nazwa 
            ]);
            Utils:: addInfoMessage("Dodano nową kategorię:  " . $nazwa);
        } else {
            Utils::addErrorMessage("Nazwa kategorii musi mieć min. 3 znaki.");
        }

        App::getRouter()->redirectTo("categoryList");
    }

    public function action_categoryDelete() {
        $id = ParamUtils::getFromRequest('id');

        if (isset($id)) {
            // Sprawdzamy, czy jakieś produkty nie są przypisane do tej kategorii
            $count = App::getDB()->count("PRODUCTS", ["CATEGORIES_id_category" => $id]);
            
            if ($count == 0) {
                App::getDB()->delete("CATEGORIES", ["id_category" => $id]);
                Utils::addInfoMessage("Kategoria została usunięta.");
            } else {
                Utils:: addErrorMessage("Nie można usunąć kategorii, do której są przypisane produkty!");
            }
        }

        App::getRouter()->redirectTo("categoryList");
    }
}