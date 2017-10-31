<?php

require __DIR__.'/../vendor/autoload.php';
require '../connect.php';


use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
use Beltoise\Controller\SlideCertificationController;
use Beltoise\Controller\RealisationController;


$route = $_GET['route'];

if ($route == 'home') {
    $controller = new HomeController();
    echo $controller->showAllAction();
} elseif ($route == 'admin') {
    $controller = new AdminController();
    echo $controller->showAllAction();
} elseif ($route == 'adminCertifications') {
    $controller = new SlideCertificationController();
    echo $controller->showAdminCertificationsAction();
} elseif ($route == 'adminSlider') {
    $controller = new SlideCertificationController();
    echo $controller->showAdminSliderAction();
} elseif ($route == 'deleteCertification') {
    $controller = new SlideCertificationController();
    echo $controller->deleteCertificationAction();
} elseif ($route == 'deleteSlide') {
    $controller = new SlideCertificationController();
    echo $controller->deleteSlideAction();
} elseif ($route == 'adminPlatrerie') {
    $controller = new RealisationController();
    echo $controller->showAdminPlatrerieAction();
} elseif ($route == 'adminRealEco') {
    $controller = new RealisationController();
    echo $controller->showAdminRealEcoAction();
} elseif ($route == 'deletePlatrerie') {
    $controller = new RealisationController();
    echo $controller->deletePlatrerieAction();
} elseif ($route == 'deleteRealEco') {
    $controller = new RealisationController();
    echo $controller->deleteRealEcoAction();
} else {
    echo 'La page n\'existe pas';
}
