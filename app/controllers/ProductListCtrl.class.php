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

        // 2. Budowanie zapytania do bazy danych
        $where = [];
        if (isset($search_name) && strlen($search_name) > 0) {
            $where["nazwa_produktu[~]"] = $search_name;
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

        // 5. POPRAWKA SESJI: Wczytujemy obiekt użytkownika przez SessionUtils
        // loadObject automatycznie wykona unserialize(), więc login będzie dostępny jako pole obiektu
        $user = SessionUtils::loadObject('user', true); // true = zachowaj w sesji

        // 6. PRZEKAZANIE DANYCH DO WIDOKU
        App::getSmarty()->assign('isAdmin', $isAdmin);
        App::getSmarty()->assign('isPracownik', $isPracownik);
        App::getSmarty()->assign('isKlient', $isKlient);
        
        // Przekazujemy "odpakowany" obiekt. W szablonie zadziała {$user->login}
        App::getSmarty()->assign('user', $user);

        App::getSmarty()->assign("searchForm", (object) ['nazwa' => $search_name]);
        App::getSmarty()->assign("produkty", $records);

        // Wyświetlenie widoku
        App::getSmarty()->display("ProductList.tpl");
    }
}