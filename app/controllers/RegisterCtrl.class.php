<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;

class RegisterCtrl {
    private $form = [];

    public function action_registerRender() {
        $this->generateView();
    }

    public function action_register() {
        $this->form['login'] = ParamUtils::getFromRequest('login');
        $this->form['pass'] = ParamUtils::getFromRequest('pass');
        $this->form['pass2'] = ParamUtils::getFromRequest('pass2');
        $this->form['email'] = ParamUtils::getFromRequest('email');

        // Walidacja
        if (empty($this->form['login']) || empty($this->form['pass']) || empty($this->form['email'])) {
            App::getMessages()->addError('Wypełnij wszystkie pola!');
        }

        if ($this->form['pass'] !== $this->form['pass2']) {
            App::getMessages()->addError('Hasła nie są identyczne!');
        }

        // Sprawdzenie czy jest login zajęty
        if (!App::getMessages()->isError()) {
            $exists = App::getDB()->has("USERS", ["login" => $this->form['login']]);
            if ($exists) {
                App::getMessages()->addError('Ten login jest już zajęty!');
            }
        }

        // Zapis danych do bazy
        if (!App::getMessages()->isError()) {
            App::getDB()->insert("USERS", [
                "login" => $this->form['login'],
                "password" => $this->form['pass'], // dodasz hashowanie
                "email" => $this->form['email'],
            ]);

            $userId = App::getDB()->id(); // Pobieramy ID nowo wstawionego użytkownika

            // Pobieramy ID roli z bazy danych
            $roleData = App::getDB()->get("ROLES", "id_role", ["rola_nazwa" => "klient"]);

            App::getDB()->insert("USER_ROLES", [
                "USERS_id_user" => $userId,
                "ROLES_id_role" => $roleData
            ]);

            App::getMessages()->addInfo('Konto założone pomyślnie! Możesz się zalogować.');
            header("Location: ".App::getConf()->app_url."/ctrl.php?action=login");
            return;
        }

        $this->generateView();
    }

    private function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('RegisterView.tpl');
    }
}