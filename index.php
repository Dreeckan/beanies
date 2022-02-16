<?php

include 'includes/autoload.php';
include 'includes/pages.php';
include 'includes/config.inc.php';

$page = $pagesHandler->getCurrent($_GET);

$controller = $page->getController();
$current = new $controller($db, $page);
$current->render();
