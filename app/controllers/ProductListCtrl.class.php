<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;

class ProductListCtrl {

    public function action_productList() {
        // 1. Pobieranie parametrów wyszukiwania
        $search_name = ParamUtils::getFromRequest('sf_nazwa');
        $search_category = ParamUtils::getFromRequest('sf_kategoria');

        // 2. Budowanie zapytania do bazy danych
        $where = [];
        if (isset($search_name) && strlen($search_name) > 0) {
            $where["nazwa_produktu[~]"] = $search_name;
        }

        // Filtrowanie po kategorii - POPRAWIONA NAZWA KOLUMNY
        if (isset($search_category) && $search_category != '' && $search_category != 'wszystkie') {
            $where["CATEGORIES_id_category"] = $search_category;  // ← ZMIENIONE z id_kategori
        }

        // 3. Sprawdzanie ról za pomocą mechanizmu Amelii
        $isAdmin = RoleUtils::inRole('admin');
        $isPracownik = RoleUtils::inRole('pracownik');
        $isKlient = RoleUtils::inRole('klient');

        // Jeśli nie jest adminem ani pracownikiem, pokazuj tylko aktywne mydła
        if (!$isAdmin && !$isPracownik) {
            $where["czy_aktywny"] = 1;
        }

        // 4. Pobieranie produktów z bazy
        $records = App::getDB()->select("PRODUCTS", "*", $where);

        // 5. Pobieranie wszystkich kategorii dla filtra
        $categories = App::getDB()->select("CATEGORIES", "*");

        // 6. POPRAWKA SESJI:  Wczytujemy obiekt użytkownika przez SessionUtils
        $user = SessionUtils::loadObject('user', true);

        // 7. PRZEKAZANIE DANYCH DO WIDOKU
        App::getSmarty()->assign('isAdmin', $isAdmin);
        App::getSmarty()->assign('isPracownik', $isPracownik);
        App::getSmarty()->assign('isKlient', $isKlient);
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('categories', $categories);
        App::getSmarty()->assign("searchForm", (object) [
            'nazwa' => $search_name,
            'kategoria' => $search_category
        ]);
        App::getSmarty()->assign("produkty", $records);

        // Wyświetlenie widoku
        App::getSmarty()->display("ProductList.tpl");
    }
}