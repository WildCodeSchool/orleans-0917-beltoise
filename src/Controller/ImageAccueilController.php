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
                header('Location: index.php?route=adminImageAccueil');
                exit;
            }
        }

        return $this->twig->render('Admin/adminImageAccueil.html.twig', [
            'uploadErrors' => $uploadErrors,
        ]);
    }
}
