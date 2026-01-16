<?php

use core\App;
use core\Utils;

// Domyślna trasa
App::getRouter()->setDefaultRoute('mainPage');

// Trasa logowania (przekierowanie jeśli brak uprawnień)
App::getRouter()->setLoginRoute('login');

// ======================================
// TRASY PUBLICZNE
// ======================================

Utils::addRoute('mainPage', 'MainPageCtrl');
Utils::addRoute('productList', 'ProductListCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('registerRender', 'RegisterCtrl');
Utils::addRoute('register', 'RegisterCtrl');

// Wylogowanie (dla zalogowanych użytkowników)
Utils::addRoute('logout', 'LoginCtrl', ['klient', 'admin', 'pracownik']);

// ======================================
// TRASY KLIENTA (wymaga roli 'klient')
// ======================================

Utils::addRoute('cartAdd', 'CartCtrl', ['klient']);
Utils::addRoute('cartView', 'CartCtrl', ['klient']);
Utils::addRoute('cartClear', 'CartCtrl', ['klient']);
Utils::addRoute('orderSave', 'CartCtrl', ['klient']);
Utils::addRoute('orderHistory', 'OrderListCtrl', ['klient']);
Utils::addRoute('orderDetails', 'OrderListCtrl', ['klient', 'pracownik', 'admin']);

// ======================================
// TRASY PRACOWNIK (wymaga roli 'pracownik')
// ======================================

Utils::addRoute('productNew', 'ProductEditCtrl', ['pracownik']);
Utils::addRoute('productSave', 'ProductEditCtrl', ['pracownik']);
Utils::addRoute('productEdit', 'ProductEditCtrl', ['pracownik']);
Utils::addRoute('productDelete', 'ProductEditCtrl', ['pracownik']);
Utils::addRoute('orderList', 'OrderListCtrl', ['pracownik']);
Utils::addRoute('orderShip', 'OrderListCtrl', ['pracownik']);
Utils::addRoute('categoryList', 'CategoryListCtrl', ['pracownik']);
Utils::addRoute('categorySave', 'CategoryListCtrl', ['pracownik']);
Utils::addRoute('categoryDelete', 'CategoryListCtrl', ['pracownik']);

// ======================================
// TRASY ADMIN (wymaga roli 'admin')
// ======================================

Utils::addRoute('userList', 'UserListCtrl', ['admin']);
Utils::addRoute('userActive', 'UserListCtrl', ['admin']);
Utils::addRoute('userChangeRole', 'UserListCtrl', ['admin']);