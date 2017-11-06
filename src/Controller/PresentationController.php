<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 02/11/17
 * Time: 17:13
 */

namespace Beltoise\Controller;
use Beltoise\Model\PresentationManager;
use Beltoise\Model\Presentation;
use Beltoise\Model\RenovationManager;

class PresentationController extends Controller
{

    public function presentationPlatrerieAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllPlatrerie();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminPlatrerie');
    }

    public function presentationRealEcoAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllRealEco();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminRealEco');
    }

    public function presentationRenovationAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllRenovation();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminRenovations');
    }

    public function presentationMaconnerieAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllMaconnerie();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminSlider');
    }

    public function presentationAccueilAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllAccueil();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminCertifications');
    }

    public function presentationPrestationAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllPrestation();
        $presentation = $presentation[0];
        $presentation->setTexte($_POST['texte']);
        $presentationManager->update($presentation);
        header('Location: admin.php?route=adminSlider');
    }


}