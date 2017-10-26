<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 26/10/17
 * Time: 21:40
 */

namespace Beltoise\Controller;


use Beltoise\Model\Renovation;
use Beltoise\model\RenovationManager;
use Beltoise\Service\UploadFile;

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
            $renovationManager->delete($renovation);
            unlink('assets/uploads/' . $renovation->getImageBefore());
            unlink('assets/uploads/' . $renovation->getImageAfter());
            header('Location: index.php?route=admin#AnchorRenovation');
        }
    }

    public function addRenovationAction()
    {
        $renovation = new Renovation();
        $errors = [];

        if (!empty($_FILES)) {
            $renovation->setTitle($_POST['title']);
            $renovation->setText($_POST['text']);
            $renovation->setImageBefore($_FILES['imageBefore']);
            $renovation->setImageAfter($_FILES['imageAfter']);

            if (empty($errors)) {
                $renovationManager = new RenovationManager();
                $renovationManager->insert($renovation);
                header('Location: index.php?route=admin#anchorRenovations');
            }
        }
    }
}