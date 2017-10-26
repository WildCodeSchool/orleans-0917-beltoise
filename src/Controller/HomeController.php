<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;
use Beltoise\Model\RenovationManager;


use Beltoise\Model\SlideCertificationManager;

class HomeController extends Controller
{
    public function showAllAction()
    {
        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllLogos();
        $slides = $slideCertificationManager->findAllSlides();

        return $this->twig->render('Home/home.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
        ]);
    }
    public function ShowAllAction()
    {
        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        return $this->twig->render('Home/home.html.twig', [
            'renovations' => $renovations,
        ]);
    }
}
