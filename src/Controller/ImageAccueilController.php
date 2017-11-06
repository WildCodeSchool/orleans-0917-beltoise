<?php

namespace Beltoise\Controller;


use Beltoise\Service\UploadImageManager;

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
        $uploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondMaconnerie.jpg');

            if (empty($uploadErrors)) {
                header('Location: admin.php?route=adminSlider');
                exit;
            }
        }

        return $this->twig->render('Admin/adminSlider.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondPlatrerieAction()
    {
        $uploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondPlatrerie.jpg');

            if (empty($uploadErrors)) {
                header('Location: admin.php?route=adminPlatrerie');
                exit;
            }
        }

        return $this->twig->render('Admin/adminPlatrerie.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondRealisationAction()
    {
        $uploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondRealisation.jpg');

            if (empty($uploadErrors)) {
                header('Location: admin.php?route=adminRealEco');
                exit;
            }
        }

        return $this->twig->render('Admin/adminRealEco.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminImageFondRenovationAction()
    {
        $uploadErrors = [];

        if (!empty($_POST)) {
            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageReplace($_FILES, 'imageFondRenovation.jpg');

            if (empty($uploadErrors)) {
                header('Location: admin.php?route=adminRenovations');
                exit;
            }
        }

        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }

}
