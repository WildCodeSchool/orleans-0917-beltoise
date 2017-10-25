<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 25/10/17
 * Time: 11:40
 */

namespace Beltoise\Controller;


use Beltoise\Model\RenovManager;

class AdminController extends Controller
{
    public function adminAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Admin/admin.html.twig');
    }
    public function showAllAction()
    {
        $renovmanager = new RenovManager();
        $renovs = $renovmanager->findAll();

        return $this->twig->render('Admin/admin.html.twig', [
            'renovs' => $renovs,
        ]);
    }
    public function deleteRenovAction()
    {
        if (!empty($_POST['id'])) {
            $renovManager = new RenovManager();
            $renov = $renovManager->find($_POST['id']);
            $renovManager->delete($renov);
            header('Location: index.php?route=admin');
        }
    }
}