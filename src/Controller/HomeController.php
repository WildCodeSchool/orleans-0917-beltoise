<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;
use Beltoise\Model\realisation;
use Beltoise\Model\RealisationManager;

class HomeController extends Controller
{
    public function homeAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Home/home.html.twig');
    }

    public function showAllAction()
    {
        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();
        return $this->twig->render('Home/home.html.twig', [
            'platreries' => $platreries,
            'realEcos' => $realEcos
        ]);
    }
}
