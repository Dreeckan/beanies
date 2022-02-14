<?php

ob_start();

include_once 'includes/header.php';

$pagesHandler = new PagesHandler([
    new Page('list', 'Tous nos bonnets'),
    new Page('home', 'Bienvenue !'),
    new Page('login', 'Connexion'),
    new Page('logout', ''),
    new Page('cart', 'Votre panier'),
    new Page('contact', 'Nous contacter'),
]);

$page = $pagesHandler->getCurrent($_GET);

$pageTitle = $page->getTitle();

include_once 'pages/' . $page->getFileName() . '.php';

include_once 'includes/footer.php';

ob_end_flush();
