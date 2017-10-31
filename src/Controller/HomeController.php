<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;


use Beltoise\Model\RealisationManager;
use Beltoise\Model\RenovationManager;
use Beltoise\Model\SlideCertificationManager;

class HomeController extends Controller
{
    public function showAllAction()
    {
        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllCertifications();
        $slides = $slideCertificationManager->findAllSlides();

        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();

        $formErrors = [];
        $formSuccessMessage = '';
        $regexMail= "/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/";

        if (!empty($_POST['submitForm'])) {

            if (empty($_POST['formLastName'])) {
                $formErrors['formLastName'] = "Merci de renseigner votre nom";
            }
            if (empty($_POST['formLastName'])) {
                $formErrors['formFirstName'] = "Merci de renseigner votre prénom";
            }
            if (empty($_POST['formMail']) or !preg_match($regexMail, ($_POST['formMail']))) {
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
                $header = "Envoi de message sur Beltoise.com"; // TODO : changer le nom de domaine si nécessaire

                $messageSent = $firstName . ' ' . $lastName . ' vous a envoyé un message sur Beltoise.com :' . "\r\n\r\n" . $formMessage . "\r\n\r\n" .
                    'E-mail : ' . $setFrom;

                require '../mailConfig.php';

                if (empty($formErrors)) {

                    header('Location: index.php?route=home#anchorContact');
                    exit();
                }
            }
        }

        return $this->twig->render('Home/home.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
            'renovations' => $renovations,
            'platreries' => $platreries,
            'realEcos' => $realEcos,
            'formErrors' => $formErrors,
            'post' => $_POST,
            'formSuccessMessage' => $formSuccessMessage,
        ]);
    }
}
