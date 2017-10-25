<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:39
 */

namespace Beltoise\Controller;
use Beltoise\Model\SlideCertificationManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        $slideCertificationManager = new SlideCertificationManager();
        $logos = $slideCertificationManager->findAllLogos();
        $slides = $slideCertificationManager->findAllSlides();

        return $this->twig->render('Admin/admin.html.twig', [
            'logos' => $logos,
            'slides' => $slides,
        ]);
    }

    public function deleteSlideCertificationAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $slideCertification = $slideCertificationManager->find($_POST['id']);
            $slideCertificationManager->delete($slideCertification);
            header('Location: index.php?route=admin');
        }
    }
}