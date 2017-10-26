<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 25/10/17
 * Time: 11:40
 */

namespace Beltoise\Controller;


use Beltoise\Model\RenovationManager;

class AdminController extends Controller
{
    public function adminAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Admin/admin.html.twig');
    }
    public function showAllAction()
    {
        $renovationmanager = new RenovationManager();
        $renovations = $renovationmanager->findAll();

        return $this->twig->render('Admin/admin.html.twig', [
            'renovations' => $renovations,
        ]);
    }
    public function deleteRenovationAction()
    {
        if (!empty($_POST['id'])) {
            $renovationManager = new RenovationManager();
            $renovation = $renovationManager->find($_POST['id']);
            $renovationManager->delete($renovation);
            unlink( 'assets/uploads/' . $renovation->getImageBefore());
            unlink( 'assets/uploads/' . $renovation->getImageAfter());
            header('Location: index.php?route=admin#AnchorRenovation');
        }
    }
}