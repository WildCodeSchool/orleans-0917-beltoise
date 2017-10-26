<?php

require '../vendor/autoload.php';
require '../connect.php';

use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
use Beltoise\Controller\RenovationController;

// Routeur basique, necessite une url index.php?route=xxx
$route = $_GET['route'];
// On appelle une methode d'un controlleur en fonction de la route saisie en URL
if ($route == 'admin') {
    $controller = new AdminController();
    echo $controller->showAllAction();
} elseif ($route == 'home') {
    $controller = new HomeController();
    echo $controller->showAllAction();
} elseif ($route == 'adminRenovations') {
    $controller = new RenovationController();
    echo $controller->showAdminRenovation();
} elseif ($route == 'deleteRenovation') {
    $controller = new RenovationController();
    echo $controller->deleteRenovationAction();
} else {
    echo 'La page n\'existe pas';
}

