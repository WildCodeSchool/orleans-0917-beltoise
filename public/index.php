<?php

require __DIR__ . '/../vendor/autoload.php';
require '../connect.php';


use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
use Beltoise\Controller\SlideCertificationController;
use Beltoise\Controller\FormController;

// Routeur basique, necessite une url index.php?route=xxx
$route = $_GET['route'];
// On appelle une methode d'un controlleur en fonction de la route saisie en URL
if ($route == 'home') {
    $controller = new HomeController();
    echo $controller->showAllAction();
} elseif ($route == 'admin') {
    $controller = new AdminController();
    echo $controller->showAllAction();
} elseif ($route == 'adminCertifications') {
    $controller = new SlideCertificationController();
    echo $controller->showAdminCertifications();
} elseif ($route == 'adminSlider') {
    $controller = new SlideCertificationController();
    echo $controller->showAdminSlider();
} elseif ($route == 'deleteCertification') {
    $controller = new SlideCertificationController();
    echo $controller->deleteCertificationAction();
} elseif ($route == 'deleteSlide') {
    $controller = new SlideCertificationController();
    echo $controller->deleteSlideAction();
} elseif ($route == 'adminForm') {
    $controller = new FormController();
    echo $controller->showAll();
} else {
    echo 'La page n\'existe pas';
}
