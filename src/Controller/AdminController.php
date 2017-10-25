<?php

namespace Beltoise\Controller;
use Beltoise\Model\RealEcoPlatrerie;
use Beltoise\Model\RealEcoPlatrerieManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        $realEcoPlatrerieManager = new RealEcoPlatrerieManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();
        return $this->twig->render('Admin/admin.html.twig', [
            'platreries' => $platreries,
            'realEcos' => $realEcos
        ]);
    }

    public function deleteEcoPlatrerieAction()
    {
        if (!empty($_POST['id'])) {
            $realEcoPlatrerieManager = new RealEcoPlatrerieManager();
            $realEcoPlatrerie = $realEcoPlatrerieManager->find($_POST['id']);
            $realEcoPlatrerieManager->delete($realEcoPlatrerie);
            header('Location: index.php?route=admin');
        }
    }
}