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
        ]);
    }
}
