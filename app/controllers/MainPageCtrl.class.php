<?php
namespace app\controllers;

use core\App;
use core\Utils;

class MainPageCtrl {
    public function action_mainPage() {
        App::getSmarty()->display('MainPage.tpl');
    }
}