<?php
require '../vendor/autoload.php';
require '../connect.php';

use Beltoise\Controller\HomeController;

if (empty ($_GET['route'])) {

        $controller = new HomeController();
        echo $controller -> showAllAction();
}
