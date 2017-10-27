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


use Beltoise\Model\RenovationManager;
use Beltoise\Model\SlideCertificationManager;

class HomeController extends Controller
{
    public function showAllAction()
    {
        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllLogos();
        $slides = $slideCertificationManager->findAllSlides();

        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        $realEcoPlatrerieManager = new RealisationManager();
        $platreries = $realEcoPlatrerieManager->findAllPlatrerie();
        $realEcos = $realEcoPlatrerieManager->findAllRealEco();

        return $this->twig->render('Home/home.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
            'renovations' => $renovations,
            'platreries' => $platreries,
            'realEcos' => $realEcos,
        ]);
    }
}
