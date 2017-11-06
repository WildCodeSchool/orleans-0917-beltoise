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
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminPlatrerie');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
        }
    }

    public function presentationRealEcoAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllRealEco();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminRealEco');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
        }
    }

    public function presentationRenovationAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllRenovation();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminRenovations');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
            header('Location: admin.php?route=adminRenovations');
        }
    }

    public function presentationMaconnerieAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllMaconnerie();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminSlider');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
            header('Location: admin.php?route=adminSlider');
        }
    }

    public function presentationAccueilAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllAccueil();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminCertifications');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
            header('Location: admin.php?route=adminCertifications');
        }
    }

    public function presentationPrestationAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllPrestation();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: admin.php?route=adminSlider');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
            header('Location: admin.php?route=adminSlider');
        }
    }
}