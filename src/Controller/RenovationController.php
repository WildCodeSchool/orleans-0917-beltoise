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
        //$errors = []; TODO

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
                header('Location: index.php?route=adminRenovations');
            }
        }
    }


    public function addRenovationAction()
    {
        $renovation = new Renovation();
        $errors = [];
        $errorsUpload = [];
            if (!empty($_FILES['imageBefore']) AND !empty($_FILES['imageAfter'])) {

                if (!empty($_POST['title'])) {

                    $renovation->setTitle($_POST['title']);
                    $renovation->setText($_POST['text']);
                    $renovation->setImageBefore($_FILES['imageBefore']['name']);
                    $renovation->setImageAfter($_FILES['imageAfter']['name']);

                    if (empty(['title'] or ['text'])) {
                        echo 'Vous devez remplir le titre et le texte';
                    }

                    if (empty($errors)) {


                        $uploadImageBeforeManager = new UploadImageManager();
                        $errorsUpload[] = $uploadImageBeforeManager->imageUploadBeforeAfter($_FILES['imageBefore']);
                        $uploadImageAfterManager = new UploadImageManager();
                        $errorsUpload[] = $uploadImageAfterManager->imageUploadBeforeAfter($_FILES['imageAfter']);



                        if (empty($errorsUpload)) {

                            $renovation->setImageBefore($_FILES['imageBefore']['name']);
                            $renovation->setImageAfter($_FILES['imageAfter']['name']);
                            echo "post et file";

                            die();
                            // TRAITEMENT MISE EN BASE DE DONNEE

                            header('Location: index.php?route=admin');
                            exit;
                        }
                        echo "errorsUpload";

                    }
                } else {
                    $errors[] = 'Vous devez remplir tous les champs';
                }
            } else {
                $errors[] = 'Vous devez ajouter un fichier BEFORE et AFTER';
            }
        echo "errors";


        /**/

        if (empty($errors)) {
            $renovationManager = new RenovationManager();
            $renovationManager->insert($renovation);
            header('Location: index.php?route=admin#anchorRenovations');
        }
        $renovationManager = new RenovationManager();
        $renovations = $renovationManager->findAllRenovations();

        return $this->twig->render('Admin/adminRenovations.html.twig', [
            'renovations' => $renovations,
        ]);

    }
}