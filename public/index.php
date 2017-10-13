<?php
require '../vendor/autoload.php';

use Beltoise\Controller\HomeController;

if (!empty ($GET['route'])) {
    if ($_GET['route'] === 'one-page') {
        // charge la page
        $controller = new MenuController();
        $controller->showAction();
    } else {
        $controller = new HomeController();
        echo $controller -> showAction();
    }
}

?>