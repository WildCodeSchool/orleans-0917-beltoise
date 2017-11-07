<?php

namespace Beltoise\Controller;


use Beltoise\Service\UploadImageManager;
use Beltoise\Model\SlideCertificationManager;
use Beltoise\Model\PresentationManager;
use Beltoise\Model\RealisationManager;

/**
 * Class ImageAccueilController
 * @package Beltoise\Controller
 */
class ImageAccueilController extends Controller
{
    /**
     * @return string
     */
    public function showAdminImageAccueilAction()
    {
        $uploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageAccueil.jpg');

            if (empty($uploadErrors)) {
                header('Location: admin.php?route=adminImageAccueil');
                exit;
            }
        }

        return $this->twig->render('Admin/adminImageAccueil.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondMaconnerieAction()
    {
        $backgroundUploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $backgroundUploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondMaconnerie.jpg');

            if (empty($backgroundUploadErrors)) {
                header('Location: admin.php?route=adminSlider');
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
            'presentationMaconneries' => $presentationMaconneries,
            'presentationPrestations' => $presentationPrestations,
            'backgroundUploadErrors' => $backgroundUploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondPlatrerieAction()
    {
        $backgroundUploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $backgroundUploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondPlatrerie.jpg');

            if (empty($backgroundUploadErrors)) {
                header('Location: admin.php?route=adminPlatrerie');
                exit;
            }
        }

        $realisationManager = new RealisationManager();
        $platreries = $realisationManager->findAllPlatrerie();
        $presentationPlatrerieManager = new PresentationManager();
        $presentationPlatreries = $presentationPlatrerieManager->findAllPlatrerie();

        return $this->twig->render('Admin/adminPlatrerie.html.twig', [
            'backgroundUploadErrors' => $backgroundUploadErrors,
            'platreries' => $platreries,
            'presentationPlatreries' => $presentationPlatreries,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondRealisationAction()
    {
        $backgroundUploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $backgroundUploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondRealisation.jpg');

            if (empty($backgroundUploadErrors)) {
                header('Location: admin.php?route=adminRealEco');
                exit;
            }
        }

        $realisationManager = new RealisationManager();
        $realEcos = $realisationManager->findAllRealEco();
        $presentationRealecoManager = new PresentationManager();
        $presentationRealEcos = $presentationRealecoManager->findAllRealEco();

        return $this->twig->render('Admin/adminRealeco.html.twig', [
            'realEcos' => $realEcos,
            'backgroundUploadErrors' => $backgroundUploadErrors,
            'presentationRealEcos' => $presentationRealEcos,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondRenovationAction()
    {
        $backgroundUploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $backgroundUploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondRenovation.jpg');

            if (empty($backgroundUploadErrors)) {
                header('Location: admin.php?route=adminRenovations');
                exit;
            }
        }

        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'backgroundUploadErrors' => $backgroundUploadErrors,
        ]);
    }

}
