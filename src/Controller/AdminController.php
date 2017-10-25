<?php

namespace Beltoise\Controller;
use Beltoise\Model\realisation;
use Beltoise\Model\RealisationManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        $realisationManager = new RealisationManager();
        $platreries = $realisationManager->findAllPlatrerie();
        $realEcos = $realisationManager->findAllRealEco();
        return $this->twig->render('Admin/admin.html.twig', [
            'platreries' => $platreries,
            'realEcos' => $realEcos
        ]);
    }

    public function deleteRealisationAction()
    {
        if (!empty($_POST['id'])) {
            $realEcoPlatrerieManager = new RealisationManager();
            $realEcoPlatrerie = $realEcoPlatrerieManager->find($_POST['id']);
            $realEcoPlatrerieManager->delete($realEcoPlatrerie);
            header('Location: index.php?route=admin');
        }
    }
}