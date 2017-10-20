<?php
require '../vendor/autoload.php';

use Beltoise\Controller\HomeController;

if (empty ($_GET['route'])) {

        $controller = new HomeController();
        echo $controller -> homeAction();
}
