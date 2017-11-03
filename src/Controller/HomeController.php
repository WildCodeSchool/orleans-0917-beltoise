<?php

namespace Beltoise\Controller;

use Beltoise\Model\RealisationManager;
use Beltoise\Model\PresentationManager;
use Beltoise\Model\RenovationManager;
use Beltoise\Model\SlideCertificationManager;

class HomeController extends Controller
{
    /**
     * @return string
     */
    public function showAllAction()
    {
        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllCertifications();
        $slides = $slideCertificationManager->findAllSlides();

        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAllRenovations();

        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();

        $presentationAccueilManager = new PresentationManager();
        $presentationAccueils = $presentationAccueilManager->findAllAccueil();

        $presentationPlatrerieManager = new PresentationManager();
        $presentationPlatreries = $presentationPlatrerieManager->findAllPlatrerie();

        $presentationRealEcoManager = new PresentationManager();
        $presentationRealEcos = $presentationRealEcoManager->findAllRealEco();

        $presentationRenovationManager = new PresentationManager();
        $presentationRenovations = $presentationRenovationManager->findAllRenovation();

        $presentationMaconnerieManager = new PresentationManager();
        $presentationMaconneries = $presentationMaconnerieManager->findAllMaconnerie();

        $formErrors = [];
        $formSuccess = '';

        if (!empty($_GET['formSuccess'])) {
            $formSuccess = 'Message envoyé';
        }

        $regexMail = "/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/";

        if (!empty($_POST['submitForm'])) {

            if (empty($_POST['formLastName'])) {
                $formErrors['formLastName'] = "Merci de renseigner votre nom";
            }
            if (empty($_POST['formLastName'])) {
                $formErrors['formFirstName'] = "Merci de renseigner votre prénom";
            }
            if (empty($_POST['formMail']) or !preg_match($regexMail, $_POST['formMail'])) {
                $formErrors['formMail'] = "Merci de renseigner votre email";
            }
            if (empty($_POST['formMessage'])) {
                $formErrors['formMessage'] = "Merci d'écrire un message";
            }

            if (empty($formErrors)) {

                $setFrom = $_POST['formMail'];
                $firstName = ucfirst($_POST['formFirstName']);
                $lastName = ucfirst($_POST['formLastName']);
                $formMessage = $_POST['formMessage'];
                $header = "Envoi de message sur beltoise.com"; // TODO : changer le nom de domaine si nécessaire

                $messageSent = $firstName . ' ' . $lastName . ' vous a envoyé un message sur beltoise.com :'
                    . "\r\n\r\n" . $formMessage . "\r\n\r\n" . 'E-mail : ' . $setFrom;

                require '../mailConfig.php';

                header('Location: index.php?route=home&formSuccess=1&#anchorContact');
                exit();
            }
        }


        return $this->twig->render('Home/home.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
            'renovations' => $renovations,
            'platreries' => $platreries,
            'realEcos' => $realEcos,
            'presentationAccueils' => $presentationAccueils,
            'presentationPlatreries' => $presentationPlatreries,
            'presentationRealEcos' => $presentationRealEcos,
            'presentationRenovations' => $presentationRenovations,
            'presentationMaconneries' => $presentationMaconneries,
            'formErrors' => $formErrors,
            'formSuccess' => $formSuccess,
        ]);
    }
}
