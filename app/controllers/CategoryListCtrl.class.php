<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;

class CategoryListCtrl {
    
    public function action_categoryList() {
        $categories = App::getDB()->select("CATEGORIES", "*");
        
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign('msgs', App::getMessages());
        App::getSmarty()->display('CategoryList.tpl');
    }

    public function action_categorySave() {
    $nazwa = ParamUtils::getFromRequest('nazwa_kategorii'); // To co wpisał Jan w formularzu

    if (isset($nazwa) && strlen($nazwa) > 2) {
        // Klucz w tablicy musi pasować do kolumny w bazie: 'nazwa_kategori'
        App::getDB()->insert("CATEGORIES", [
            "nazwa_kategori" => $nazwa 
        ]);
        App::getMessages()->addInfo("Dodano nową kategorię: " . $nazwa);
    } else {
        App::getMessages()->addError("Nazwa kategorii musi mieć min. 3 znaki.");
    }

    App::getRouter()->redirectTo("categoryList");
}

    public function action_categoryDelete() {
    $id = ParamUtils::getFromRequest('id');

    if (isset($id)) {
        // Sprawdzamy, czy jakieś mydła nie są przypisane do tej kategorii
        $count = App::getDB()->count("PRODUCTS", ["id_kategori" => $id]);
        
        if ($count == 0) {
            App::getDB()->delete("CATEGORIES", ["id_category" => $id]);
            App::getMessages()->addInfo("Kategoria została usunięta.");
        } else {
            App::getMessages()->addError("Nie można usunąć kategorii, do której są przypisane produkty!");
        }
    }

    App::getRouter()->redirectTo("categoryList");
}
}
