<?php

require __DIR__ . '/../vendor/autoload.php';
require '../connect.php';


use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
use Beltoise\Controller\SlideCertificationController;
use Beltoise\Controller\FormController;
use Beltoise\Controller\RenovationController;
use Beltoise\Controller\ImageAccueilController;
use Beltoise\Controller\LogoEntrepriseController;
use Beltoise\Controller\RealisationController;
use Beltoise\Controller\PresentationController;

if (!empty($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = 'home'; // go to home by default
}
if ($route == 'home') {
    $controller = new HomeController();
    echo $controller->showAllAction();

} else {
    echo 'La page n\'existe pas';
}