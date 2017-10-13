<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;

class HomeController
{
    public function showAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Home/home.html.twig');
    }
}
