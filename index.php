<?php
$pages = [
    'list'   => 'Tous nos bonnets',
    'home'   => 'Bienvenue !',
    'login'  => 'Connexion',
    'logout' => '',
    'cart'   => 'Votre panier',
];

$page = 'home';

if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
    $page = $_GET['page'];
}

$pageTitle = $pages[$page];


include_once 'includes/header.php';

include_once 'pages/' . $page . '.php';

include_once 'includes/footer.php';
