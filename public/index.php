<?php
require '../vendor/autoload.php';
require '../connect.php';

use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;


// Routeur basique, necessite une url index.php?route=xxx
    $route = $_GET['route'];
// On appelle une methode d'un controlleur en fonction de la route saisie en URL
if ($route == 'admin') {

    $AdminController = new AdminController();
    echo  $AdminController->showAllAction();

} elseif ($route == 'home') {

    $HomeController = new HomeController();
    echo $HomeController->ShowAllAction();
}else {
    echo 'La page n\'existe pas';
}
