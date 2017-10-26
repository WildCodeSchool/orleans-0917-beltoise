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