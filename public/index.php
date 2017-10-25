<?php

require __DIR__.'/../vendor/autoload.php';
require '../connect.php';
use Beltoise\Controller\HomeController;
use Beltoise\Controller\AdminController;
$route = $_GET['route'];
if ($route=='home') {
    $controller = new HomeController();
    echo $controller->showAllAction();
}
if ($route=='admin') {
    $controller = new AdminController();
    echo $controller->showAllAction();
} elseif ($route == 'delete') {
    $controller = new AdminController();
    echo $controller->deleteAction();
}