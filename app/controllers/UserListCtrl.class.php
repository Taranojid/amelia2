<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class UserListCtrl {

    public function action_userList() {
        // Pobierz zalogowanego użytkownika
        $user = SessionUtils::loadObject('user', true);
        
        // Pobieramy dane użytkowników wraz z ich rolami
        $users = App:: getDB()->select("USERS", [
            "[>]USER_ROLES" => ["id_user" => "USERS_id_user"],
            "[>]ROLES" => ["USER_ROLES.ROLES_id_role" => "id_role"]
        ], [
            "USERS.id_user",
            "USERS.login",
            "USERS.czy_aktywny",
            "ROLES.rola_nazwa"
        ]);

        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('users', $users);
        App::getSmarty()->display('UserList.tpl');
    }

    public function action_userActive() {
        $id = ParamUtils::getFromRequest('id');
        $active = ParamUtils::getFromRequest('active');
        
        // ✅ Pobierz ID zalogowanego admina z bazy na podstawie loginu
        $adminUser = SessionUtils::loadObject('user', true);
        $adminId = null;
        if ($adminUser && isset($adminUser->login)) {
            $adminId = App::getDB()->get("USERS", "id_user", ["login" => $adminUser->login]);
        }

        if (isset($id) && isset($active)) {
            App::getDB()->update("USERS", [
                "czy_aktywny" => $active,
                "zmodyfikowane_przez" => $adminId,
                "kiedy_modyfikowane" => date("Y-m-d H:i:s")
            ], [
                "id_user" => $id
            ]);
            
            $msg = ($active == 1) ? "Użytkownik został odblokowany." : "Użytkownik został zablokowany.";
            Utils::addInfoMessage($msg);
        }

        App::getRouter()->redirectTo("userList");
    }

    public function action_userChangeRole() {
        $id = ParamUtils::getFromRequest('id');
        $newRole = ParamUtils::getFromRequest('role');
        
        // ✅ Pobierz ID zalogowanego admina z bazy na podstawie loginu
        $adminUser = SessionUtils::loadObject('user', true);
        $adminId = null;
        if ($adminUser && isset($adminUser->login)) {
            $adminId = App::getDB()->get("USERS", "id_user", ["login" => $adminUser->login]);
        }

        if (isset($id) && isset($newRole)) {
            // Pobierz ID roli na podstawie nazwy
            $roleData = App::getDB()->get("ROLES", "id_role", ["rola_nazwa" => $newRole]);
            
            // Usuń starą rolę
            App::getDB()->delete("USER_ROLES", [
                "USERS_id_user" => $id
            ]);
            
            // Przypisz nową rolę
            if ($roleData) {
                App::getDB()->insert("USER_ROLES", [
                    "USERS_id_user" => $id,
                    "ROLES_id_role" => $roleData
                ]);
                
                // ✅ Zaktualizuj zmodyfikowane_przez w USERS
                App::getDB()->update("USERS", [
                    "zmodyfikowane_przez" => $adminId,
                    "kiedy_modyfikowane" => date("Y-m-d H: i:s")
                ], [
                    "id_user" => $id
                ]);
                
                Utils::addInfoMessage("Zmieniono rolę na: " . $newRole);
            } else {
                Utils::addErrorMessage("Rola nie istnieje!");
            }
        }

        App::getRouter()->redirectTo("userList");
    }
}