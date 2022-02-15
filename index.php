<?php

include_once 'includes/pages.php';

$controllerName = $page->getController();

$controller = new $controllerName($page);
$controller->render();
