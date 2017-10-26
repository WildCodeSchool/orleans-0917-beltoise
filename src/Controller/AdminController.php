<?php

namespace Beltoise\Controller;

use Beltoise\Model\RenovationManager;
use Beltoise\Model\RealisationManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();

        return $this->twig->render('Admin/admin.html.twig');
    }
}
