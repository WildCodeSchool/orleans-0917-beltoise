<?php

namespace Beltoise\Controller;


use Beltoise\Model\SlideCertification;
use Beltoise\Model\SlideCertificationManager;
use Beltoise\Service\UploadImageManager;
use Beltoise\Model\PresentationManager;
use Beltoise\Model\Presentation;

class SlideCertificationController extends Controller
{
    /**
     * @return string
     */
    public function showAdminCertificationsAction()
    {
        $certification = new SlideCertification();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $certification->setRole('CERTIFICATION');

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $certification->setName($uploadImageManager->getImageName());

                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($certification);

                header('Location: index.php?route=adminCertifications&#anchorUpload');
                exit;
            }
        }

        $slideCertificationManager = new SlideCertificationManager();
        $certifications = $slideCertificationManager->findAllCertifications();
        $presentationAccueilManager = new PresentationManager();
        $presentationAccueils = $presentationAccueilManager->findAllAccueil();
        return $this->twig->render('Admin/adminCertifications.html.twig', [
            'certifications' => $certifications,
            'uploadErrors' => $uploadErrors,
            'presentationAccueils' => $presentationAccueils,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminSliderAction()
    {
        $slide = new SlideCertification();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $slide->setRole('SLIDE');

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $slide->setName($uploadImageManager->getImageName());

                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($slide);

                header('Location: index.php?route=adminSlider&#anchorUpload');
                exit;
            }
        }

        $slideCertificationManager = new SlideCertificationManager();
        $slides = $slideCertificationManager->findAllSlides();
        $presentationMaconnerieManager = new PresentationManager();
        $presentationMaconneries = $presentationMaconnerieManager->findAllMaconnerie();
        $presentationPrestationManager = new PresentationManager();
        $presentationPrestations = $presentationPrestationManager->findAllPrestation();
        return $this->twig->render('Admin/adminSlider.html.twig', [
            'slides' => $slides,
            'uploadErrors' => $uploadErrors,
            'presentationMaconneries' => $presentationMaconneries,
            'presentationPrestations' => $presentationPrestations,
        ]);
    }

    public function deleteSlideAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $slide = $slideCertificationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $slide->getName())) {
                $slideCertificationManager->delete($slide);
                unlink('assets/uploads/' . $slide->getName());
            }
            header('Location: index.php?route=adminSlider&#anchorUpload');
        }
    }

    public function deleteCertificationAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $certification = $slideCertificationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $certification->getName())) {
                $slideCertificationManager->delete($certification);
                unlink('assets/uploads/' . $certification->getName());
            }
            header('Location: index.php?route=adminCertifications&#anchorUpload');
        }
    }
}
