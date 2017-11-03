<?php

require __DIR__.'/../vendor/autoload.php';
require '../connect.php';


use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
use Beltoise\Controller\SlideCertificationController;
use Beltoise\Controller\RenovationController;
use Beltoise\Controller\ImageAccueilController;
use Beltoise\Controller\LogoEntrepriseController;
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
} elseif ($route == 'adminImageAccueil') {
    $controller = new ImageAccueilController();
    echo $controller->showAdminImageAccueilAction();
} elseif ($route == 'deleteCertification') {
    $controller = new SlideCertificationController();
    echo $controller->deleteCertificationAction();
} elseif ($route == 'deleteSlide') {
    $controller = new SlideCertificationController();
    echo $controller->deleteSlideAction();
} elseif ($route == 'adminRenovations') {
    $controller = new RenovationController();
    echo $controller->showAdminRenovationAction();
} elseif ($route == 'deleteRenovation') {
    $controller = new RenovationController();
    echo $controller->deleteRenovationAction();
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
} elseif ($route == 'adminImageFondMaconnerie') {
    $controller = new ImageAccueilController();
    echo $controller->showAdminImageFondMaconnerieAction();
} elseif ($route == 'adminImageFondPlatrerie') {
    $controller = new ImageAccueilController();
    echo $controller->showAdminImageFondPlatrerieAction();
} elseif ($route == 'adminImageFondRealisation') {
    $controller = new ImageAccueilController();
    echo $controller->showAdminImageFondRealisationAction();
} elseif ($route == 'adminImageFondRenovation') {
    $controller = new ImageAccueilController();
    echo $controller->showAdminImageFondRenovationAction();
} else {
    echo 'La page n\'existe pas';
}
