<?php

require_once 'autoload.php';

use Controller\CartController;
use Controller\ContactController;
use Controller\HomeController;
use Controller\ListController;
use Controller\LoginController;
use Controller\LogoutController;
use Model\Page;
use Service\PagesHandler;

$pagesHandler = new PagesHandler([
    new Page('list', ListController::class),
    new Page('home', HomeController::class),
    new Page('login', LoginController::class),
    new Page('logout', LogoutController::class),
    new Page('cart', CartController::class),
    new Page('contact', ContactController::class),
]);

$page = $pagesHandler->getCurrent($_GET);
