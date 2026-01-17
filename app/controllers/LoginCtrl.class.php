<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Message;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');
    }

    public function validate() {
        if (!(isset($this->form->login) && isset($this->form->pass))) return false;

        if ($this->form->login == "") {
            App::getMessages()->addMessage(new Message('Nie podano loginu', Message::ERROR));
        }
        if ($this->form->pass == "") {
            App::getMessages()->addMessage(new Message('Nie podano hasła', Message::ERROR));
        }

        if (!App::getMessages()->isError()) {
            $user_data = App::getDB()->get("USERS", "*", ["login" => $this->form->login]);

            if ($user_data && $this->form->pass == $user_data['password']) {
                
                // ✅ SPRAWDZENIE CZY KONTO JEST AKTYWNE
                if (isset($user_data['czy_aktywny']) && $user_data['czy_aktywny'] != 1) {
                    App::getMessages()->addMessage(new Message('Twoje konto zostało zablokowane.  Skontaktuj się z administratorem.', Message::ERROR));
                    return false;
                }
                
                $user_roles = App::getDB()->select("USER_ROLES", [
                    "[>]ROLES" => ["ROLES_id_role" => "id_role"]
                ], ["ROLES.rola_nazwa"], ["USERS_id_user" => $user_data['id_user']]);

                $roles_list = array_column($user_roles, 'rola_nazwa');
                
                // Tworzymy obiekt użytkownika
                $user = new User($user_data['login'], $roles_list[0] ?? 'user');

                // Zapisujemy w sesji Amelii
                SessionUtils::storeObject('user', $user);
                
                // Kluczowe dla ochrony zasobów - dodajemy wszystkie role
                foreach ($roles_list as $role) {
                    RoleUtils::addRole($role);
                }
                
                App::getMessages()->addMessage(new Message('Zalogowano pomyślnie', Message::INFO));
                return true;
            } else {
                App::getMessages()->addMessage(new Message('Niepoprawny login lub hasło', Message:: ERROR));
            }
        }
        return ! App::getMessages()->isError();
    }

    public function action_login() {
        $this->getParams();
        
        if ($this->validate()) {
            // Regeneruj ID sesji dla bezpieczeństwa
            session_regenerate_id(true);
            
            // Przekieruj do listy produktów
            App:: getRouter()->redirectTo("productList");
            exit(); // Zatrzymaj dalsze wykonywanie
        } else {
            // Pokaż formularz logowania z błędami
            $this->generateView(); 
        }
    }
    
    public function action_logout() {
        // Wyczyść wszystkie zmienne sesji
        $_SESSION = array();
        
        // Usuń ciasteczko sesji z przeglądarki
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        
        // Zniszcz sesję na serwerze
        session_destroy();
        
        // Uruchom nową sesję dla komunikatu
        session_start();
        
        App::getMessages()->addMessage(new Message('Poprawnie wylogowano', Message:: INFO));
        App::getRouter()->redirectTo("mainPage");
        exit(); // Zatrzymaj dalsze wykonywanie
    }
    
    public function generateView() {
        App::getSmarty()->assign('page_title', 'Strona logowania');
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');        
    }
}