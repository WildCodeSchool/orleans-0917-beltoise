<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 26/10/17
 * Time: 21:40
 */

namespace Beltoise\Controller;


use Beltoise\Model\Renovation;
use Beltoise\Model\RenovationManager;
use Beltoise\Service\UploadFile;
use Beltoise\Service\UploadImageManager;
use Beltoise\Model\PresentationManager;
use Beltoise\Model\Presentation;

/**
 * Class RenovationController
 * @package Beltoise\Controller
 */
class RenovationController extends Controller
{
    /**
     * @return string
     */
    public function showAdminRenovationAction()
    {
        $renovation = new Renovation();
        $uploadErrorsBefore = [];
        $uploadErrorsAfter = [];
        $errors = [];

        if (!empty($_FILES['imageBefore']) AND !empty($_FILES['imageAfter'])) {


            $renovation->setTitle($_POST['title']);
            $renovation->setText($_POST['text']);

            if ($renovation->getTitle() > 100) {
                $errors[] = 'Le titre ne doit pas faire plus de 100 caractères';
            }
            $uploadImageBeforeManager = new UploadImageManager();
            $uploadErrorsBefore = $uploadImageBeforeManager->imageUploadBefore($_FILES['imageBefore']);
            $uploadImageAfterManager = new UploadImageManager();
            $uploadErrorsAfter = $uploadImageAfterManager->imageUploadAfter($_FILES['imageAfter']);

            if (empty($uploadErrorsBefore) && empty($uploadErrorsAfter) && empty($errors) ) {

                $renovation->setImageBefore($uploadImageBeforeManager->getImageName());
                $renovation->setImageAfter($uploadImageAfterManager->getImageName());

                $renovationManager = new RenovationManager();
                $renovationManager->insert($renovation);


                header('Location: admin.php?route=adminRenovations');
                exit;
            }
        }

        $renovationManager = new RenovationManager();
        $renovations = $renovationManager->findAllRenovations();
        $presentationRenovationManager = new PresentationManager();
        $presentationRenovations = $presentationRenovationManager->findAllRenovation();
        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'renovations' => $renovations,
            'uploadErrorsBefores' => $uploadErrorsBefore,
            'uploadErrorsAfters' => $uploadErrorsAfter,
            'errors' => $errors,
            'presentationRenovations' => $presentationRenovations,
        ]);
    }

    /**
     *
     */
    public function deleteRenovationAction()
    {
        if (!empty($_POST['id'])) {
            $renovationManager = new RenovationManager();
            $renovation = $renovationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $renovation->getImageBefore())
                and 'assets/uploads/' . $renovation->getImageAfter()) {
                $renovationManager->delete($renovation);
                unlink('assets/uploads/' . $renovation->getImageBefore());
                unlink('assets/uploads/' . $renovation->getImageAfter());
            }
            header('Location: admin.php?route=adminRenovations');
        }
    }
}