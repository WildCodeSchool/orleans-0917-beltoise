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
            'realEcos' => $realEcos,
            'renovations' => $renovations,
        ]);
    }

    public function deleteRealisationAction()
    {
        if (!empty($_POST['id'])) {
            $realisationManager = new RealisationManager();
            $realisation = $realisationManager->find($_POST['id']);
            $realisationManager->delete($realisation);
            unlink ('assets/uploads/'. $realisation->getImage() );
            header('Location: index.php?route=admin');

    public function deleteRenovationAction()
    {
        if (!empty($_POST['id'])) {
            $renovationManager = new RenovationManager();
            $renovation = $renovationManager->find($_POST['id']);
            $renovationManager->delete($renovation);
            unlink( 'assets/uploads/' . $renovation->getImageBefore());
            unlink( 'assets/uploads/' . $renovation->getImageAfter());
            header('Location: index.php?route=admin#AnchorRenovation');
        }
    }
}