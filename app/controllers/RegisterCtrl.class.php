<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Message;

class RegisterCtrl {
    
    public function action_registerRender() {
        // Wyświetl formularz rejestracji
        App::getSmarty()->display('RegisterView.tpl');
    }
    
    public function action_register() {
        // Pobierz dane z formularza
        $login = trim(ParamUtils::getFromRequest('login'));
        $email = trim(ParamUtils::getFromRequest('email'));
        $imie = trim(ParamUtils::getFromRequest('imie'));
        $nazwisko = trim(ParamUtils::getFromRequest('nazwisko'));
        $password = ParamUtils::getFromRequest('password');
        $password2 = ParamUtils::getFromRequest('password2');
        
        // ✅ Walidacja - wszystkie pola wymagane
        if (empty($login) || empty($email) || empty($imie) || empty($nazwisko) || empty($password) || empty($password2)) {
            App::getMessages()->addMessage(new Message('Wypełnij wszystkie pola!', Message:: ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja długości loginu
        if (strlen($login) < 3 || strlen($login) > 50) {
            App::getMessages()->addMessage(new Message('Login musi mieć 3-50 znaków! ', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja imienia
        if (strlen($imie) < 2 || strlen($imie) > 50) {
            App::getMessages()->addMessage(new Message('Imię musi mieć 2-50 znaków!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja nazwiska
        if (strlen($nazwisko) < 2 || strlen($nazwisko) > 50) {
            App::getMessages()->addMessage(new Message('Nazwisko musi mieć 2-50 znaków! ', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Walidacja emaila
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            App:: getMessages()->addMessage(new Message('Nieprawidłowy adres email!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Sprawdź czy hasła są identyczne
        if ($password !== $password2) {
            App::getMessages()->addMessage(new Message('Hasła nie są identyczne!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Sprawdź długość hasła
        if (strlen($password) < 6) {
            App::getMessages()->addMessage(new Message('Hasło musi mieć min. 6 znaków!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Sprawdź czy login już istnieje
        if (App::getDB()->has("USERS", ["login" => $login])) {
            App::getMessages()->addMessage(new Message('Login <strong>' .  htmlspecialchars($login) . '</strong> jest już zajęty!', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // Sprawdź czy email już istnieje
        if (App::getDB()->has("USERS", ["email" => $email])) {
            App::getMessages()->addMessage(new Message('Email <strong>' . htmlspecialchars($email) . '</strong> jest już zarejestrowany! ', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
        
        // ✅ Wstaw nowego użytkownika (bez utworzone_przez - bo jeszcze nie ma ID)
        $result = App::getDB()->insert("USERS", [
            "login" => $login,
            "password" => md5($password), // ⚠️ MD5 - zastąp password_hash() dla większego bezpieczeństwa
            "email" => $email,
            "imie" => $imie,
            "nazwisko" => $nazwisko,
            "czy_aktywny" => 1,
            "kiedy_modyfikowane" => date("Y-m-d H:i: s")
        ]);
        
        if ($result) {
            // Pobierz ID nowo utworzonego użytkownika
            $newUserId = App::getDB()->id();
            
            // ✅ Zaktualizuj utworzone_przez - użytkownik utworzył sam siebie
            App::getDB()->update("USERS", [
                "utworzone_przez" => $newUserId
            ], [
                "id_user" => $newUserId
            ]);
            
            // Przypisz rolę "klient" (id_role = 3)
            App::getDB()->insert("USER_ROLES", [
                "USERS_id_user" => $newUserId,
                "ROLES_id_role" => 3, // klient
                "kiedy_dodano" => date("Y-m-d")
            ]);
            
            App::getMessages()->addMessage(new Message('Witaj <strong>' . htmlspecialchars($imie) . '</strong>! Rejestracja zakończona.  Możesz się zalogować.', Message::INFO));
            App::getRouter()->redirectTo('login');
        } else {
            App::getMessages()->addMessage(new Message('Błąd rejestracji.  Spróbuj ponownie.', Message::ERROR));
            App::getRouter()->redirectTo('registerRender');
            return;
        }
    }
}