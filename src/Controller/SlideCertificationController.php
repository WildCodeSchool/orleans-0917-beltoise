<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 26/10/17
 * Time: 17:07
 */

namespace Beltoise\Controller;


use Beltoise\Model\SlideCertification;
use Beltoise\Model\SlideCertificationManager;
use Beltoise\Service\uploadFile;

class SlideCertificationController extends Controller
{
    public function showAdminCertifications()
    {
        $certification = new SlideCertification();
//        $errors = []; TODO

        if (!empty($_POST)) {
            $certification->setRole($_POST['role']);

            $imageName = uploadFile::upload($_FILES);

            $certification->setUri($imageName);

            if (empty($errors)) {

                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($certification);

                header('Location: index.php?route=adminCertifications');
                exit;
            }

        }

        $slideCertificationManager = new SlideCertificationManager();
        $certifications = $slideCertificationManager->findAllCertifications();

        return $this->twig->render('Admin/adminCertifications.html.twig', [
            'certifications' => $certifications,
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
            header('Location: index.php?route=adminCertifications');
        }
    }

    public function addSlideCertificationAction()
    {
        $slideCertification = new SlideCertification();
        $errors = [];

        if (!empty($_FILES)) {
            $slideCertification->setRole($_POST['role']);
            $slideCertification->setUri($_FILES['name']);

            if (empty($errors)) {
                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($slideCertification);
                header('Location: index.php?route=admin#anchorCertifications');
            }
        }
    }
}