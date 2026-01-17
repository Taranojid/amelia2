<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\RoleUtils;

class ProductEditCtrl {
    
    // Wspólna metoda sprawdzania uprawnień (Pracownik lub Admin)
    private function checkPermissions() {
        if (!RoleUtils::inRole('pracownik') && !RoleUtils::inRole('admin')) {
            Utils::addErrorMessage('Brak uprawnień do tej operacji!');
            App::getRouter()->redirectTo('productList');
            exit;
        }
    }

    // Pomocnicza metoda do pobrania ID aktualnie zalogowanego użytkownika z bazy
    private function getLoggedInUserId() {
        $user = SessionUtils::loadObject('user', true);
        if ($user && isset($user->login)) {
            return App::getDB()->get("users", "id_user", ["login" => $user->login]);
        }
        return null;
    }

    // Wspólna metoda wyświetlania formularza
    private function showForm($product = null) {
        $user = SessionUtils::loadObject('user', true);
        $categories = App::getDB()->select("CATEGORIES", ["id_category", "nazwa_kategori"]);
        
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('categories', $categories);
        
        // Jeśli dodajemy nowy, tworzymy pusty obiekt dla Smarty
        App::getSmarty()->assign('product', (object) ($product ?? [
            'id_product' => null, 
            'nazwa_produktu' => '', 
            'CATEGORIES_id_category' => '', 
            'cena' => '', 
            'opis' => '', 
            'zdj_sciezka' => null
        ]));
        
        App::getSmarty()->display('ProductEdit.tpl');
    }

    public function action_productNew() {
        $this->checkPermissions();
        $this->showForm();
    }

    public function action_productEdit() {
        $this->checkPermissions();
        $id = ParamUtils::getFromRequest('id');
        
        if (!$id || !($product = App::getDB()->get("PRODUCTS", "*", ["id_product" => $id]))) {
            Utils::addErrorMessage("Nie znaleziono wybranego produktu.");
            App::getRouter()->redirectTo("productList");
            return;
        }
        
        $this->showForm($product);
    }

    public function action_productSave() {
        $this->checkPermissions();
        
        // Pobranie danych z formularza
        $id = ParamUtils::getFromRequest('id_product');
        $nazwa = trim(ParamUtils::getFromRequest('nazwa_produktu'));
        $cena = ParamUtils::getFromRequest('cena');
        $opis = trim(ParamUtils::getFromRequest('opis'));
        $kategoria = ParamUtils::getFromRequest('kategoria_id');
        
        // Pobranie ID zalogowanego użytkownika
        $userId = $this->getLoggedInUserId();

        // --- WALIDACJA ---
        $errors = [];
        if (empty($nazwa)) $errors[] = 'Nazwa produktu jest wymagana!';
        if (empty($kategoria)) $errors[] = 'Wybierz kategorię!';
        if (empty($cena) || !is_numeric($cena) || $cena <= 0) $errors[] = 'Cena musi być liczbą większą od zera!';

        if (!empty($errors)) {
            foreach ($errors as $error) Utils::addErrorMessage($error);
            // Powrót do edycji lub nowego w zależności od kontekstu
            if ($id) {
                App::getRouter()->redirectTo("productEdit&id=$id");
            } else {
                App::getRouter()->redirectTo("productNew");
            }
            return;
        }

        // --- ZAPIS DO BAZY ---
        try {
            $data = [
                "nazwa_produktu" => $nazwa,
                "CATEGORIES_id_category" => $kategoria,
                "cena" => $cena,
                "opis" => $opis,
                "modyfikowane_przez" => $userId,
                "kiedy_modyfikowane" => date("Y-m-d H:i:s")
            ];

            // Obsługa przesyłania zdjęcia (jeśli wybrano plik)
            if (isset($_FILES['zdjecie']) && $_FILES['zdjecie']['error'] == 0) {
                $fileName = $this->uploadImage($_FILES['zdjecie']);
                if ($fileName) {
                    $data["zdj_sciezka"] = $fileName;
                }
            }

            if ($id) {
                // TRYB EDYCJI
                App::getDB()->update("PRODUCTS", $data, ["id_product" => $id]);
                Utils::addInfoMessage("Zmiany w produkcie zostały zapisane.");
            } else {
                // TRYB DODAWANIA
                $data["utworzone_przez"] = $userId;
                $data["czy_aktywny"] = 1;
                
                App::getDB()->insert("PRODUCTS", $data);
                Utils::addInfoMessage("Pomyślnie dodano nowe mydło do katalogu.");
            }

            App::getRouter()->redirectTo("productList");

        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd podczas zapisu do bazy danych: " . $e->getMessage());
            $this->showForm();
        }
    }

    public function action_productDelete() {
        $this->checkPermissions();
        $id = ParamUtils::getFromRequest('id');
        $userId = $this->getLoggedInUserId();
        
        if ($id) {
            // "Miękkie" usuwanie - zmiana statusu aktywności
            App::getDB()->update("PRODUCTS", [
                "czy_aktywny" => 0,
                "modyfikowane_przez" => $userId,
                "kiedy_modyfikowane" => date("Y-m-d H:i:s")
            ], ["id_product" => $id]);
            
            Utils::addInfoMessage("Produkt został wycofany ze sprzedaży (ukryty).");
        }
        
        App::getRouter()->redirectTo("productList");
    }

    // Upload zdjęcia
    private function uploadImage($file) {
        // Ścieżka fizyczna do zapisu
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/amelia/public/uploads/products/';
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        
        // Walidacja rozmiaru (5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            Utils::addErrorMessage('Plik zdjęcia jest za duży (max 5MB)!');
            return false;
        }
        
        // Walidacja typu MIME
        $allowed = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mime, $allowed)) {
            Utils::addErrorMessage('Niedozwolony format pliku (tylko JPG, PNG, WEBP)!');
            return false;
        }
        
        // Generowanie unikalnej nazwy pliku
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $name = 'product_' . uniqid() . '.' . $extension;
        
        if (move_uploaded_file($file['tmp_name'], $dir . $name)) {
            return $name;
        }
        
        Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisywania pliku na serwerze.');
        return false;
    }
}