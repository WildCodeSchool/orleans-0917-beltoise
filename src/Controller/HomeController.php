<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;
use Beltoise\Model\PresentationManager;
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

        $realisationManager = new RealisationManager();
        $platreries = $realisationManager->findAllPlatrerie();
        $realEcos = $realisationManager->findAllRealEco();

        $presentationManager = new PresentationManager();
        $presentations = $presentationManager->findAllPresentation();

        return $this->twig->render('Home/home.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
            'renovations' => $renovations,
            'platreries' => $platreries,
            'realEcos' => $realEcos,
            'presentations' => $presentations,
        ]);
    }
}
