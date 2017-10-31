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

class RenovationController extends Controller
{
    public function showAdminRenovation()
    {
        $renovation = new Renovation();


        if (!empty($_POST)) {
            $renovation->setTitle($_POST['title']);
            $renovation->setText($_POST['text']);

            $imageName = uploadFile::upload($_FILES);

            $renovation->setImageBefore($imageName);
            $renovation->setImageAfter($imageName);

            if (empty($errors)) {

                $renovationManager = new RenovationManager();
                $renovationManager->insert($renovation);

                header('Location: index.php?route=adminRenovations');
                exit;
            }

        }

        $renovationManager = new RenovationManager();
        $renovations = $renovationManager->findAllRenovations();

        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'renovations' => $renovations,
        ]);
    }

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
            header('Location: index.php?route=adminRenovations');
        }
    }


    public function addRenovationAction()
    {
        $renovation = new Renovation();
        $uploadErrors = [];

        if (!empty($_FILES['imageBefore']) AND !empty($_FILES['imageAfter'])) {


            $renovation->setTitle($_POST['title']);
            $renovation->setText($_POST['text']);
            $renovation->setImageBefore($_FILES['imageBefore']['name']);
            $renovation->setImageAfter($_FILES['imageAfter']['name']);

            $uploadImageBeforeManager = new UploadImageManager();
            $uploadErrors = $uploadImageBeforeManager->imageUploadBefore($_FILES['imageBefore']);
            $uploadImageAfterManager = new UploadImageManager();
            $uploadErrors = $uploadImageAfterManager->imageUploadAfter($_FILES['imageAfter']);

            if (empty($uploadErrors)) {

                $renovation->setImageBefore($_FILES['imageBefore']['name']);
                $renovation->setImageAfter($_FILES['imageAfter']['name']);

                $renovationManager = new RenovationManager();
                $renovationManager->insert($renovation);


                header('Location: index.php?route=adminRenovations');
                exit;
            }
        }

        $renovationManager = new RenovationManager();
        $renovations = $renovationManager->findAllRenovations();

        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'renovations' => $renovations,
            'uploadErrors' => $uploadErrors,
        ]);

    }
}