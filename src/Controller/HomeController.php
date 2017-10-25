<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;
use Beltoise\Model\RenovManager;

class HomeController extends Controller
{
    public function homeAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Home/home.html.twig');
    }
    public function ShowAllAction()
    {
        $renovmanager = new RenovManager();
        $renovs = $renovmanager->findAll();

        return $this->twig->render('Home/home.html.twig', [
            'renovs' => $renovs,
        ]);
    }
}
