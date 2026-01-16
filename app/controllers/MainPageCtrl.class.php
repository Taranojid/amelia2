<?php
namespace app\controllers;

use core\App;
use core\Utils;

class MainPageCtrl {
    public function action_mainPage() {
        // Możesz tu pobrać np. 3 najnowsze mydła z bazy jako "Promocje"
        $promoted = App::getDB()->select("PRODUCTS", "*", [
            "LIMIT" => 3
        ]);

        App::getSmarty()->assign('promoted', $promoted);
        App::getSmarty()->display('MainPage.tpl');
    }
}