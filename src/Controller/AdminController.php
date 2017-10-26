<?php

namespace Beltoise\Controller;

use Beltoise\Model\RenovationManager;
use Beltoise\Model\RealisationManager;
use Beltoise\Model\SlideCertificationManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();

        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllLogos();
        $slides = $slideCertificationManager->findAllSlides();

        return $this->twig->render('Admin/admin.html.twig', [
            'renovations' => $renovations,
            'platreries' => $platreries,
            'realEcos' => $realEcos,
            'logos' => $logos,
            'slides' => $slides,
        ]);
    }

    public function deleteRealisationAction()
    {
        if (!empty($_POST['id'])) {
            $realisationManager = new RealisationManager();
            $realisation = $realisationManager->find($_POST['id']);
            $realisationManager->delete($realisation);
            unlink('assets/uploads/' . $realisation->getImage());
            header('Location: index.php?route=admin');
        }
    }

    public function deleteRenovationAction()
    {
        if (!empty($_POST['id'])) {
            $renovationManager = new RenovationManager();
            $renovation = $renovationManager->find($_POST['id']);
            $renovationManager->delete($renovation);
            unlink('assets/uploads/' . $renovation->getImageBefore());
            unlink('assets/uploads/' . $renovation->getImageAfter());
            header('Location: index.php?route=admin#AnchorRenovation');
        }
    }


    public function deleteSlideAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $slide = $slideCertificationManager->find($_POST['id']);
            $slideCertificationManager->delete($slide);
            unlink('assets/uploads/' . $slide->getUri());
            header('Location: index.php?route=admin#anchorMaconnerie');
        }
    }

    public function deleteCertificationAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $certification = $slideCertificationManager->find($_POST['id']);
            $slideCertificationManager->delete($certification);
            unlink('assets/uploads/' . $certification->getUri());
            header('Location: index.php?route=admin#anchorCertifications');
        }
    }
}
