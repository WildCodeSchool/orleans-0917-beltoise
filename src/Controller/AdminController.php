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
    public function AdminAction() {
        // appels éventules aux données de la vue

        //appel à la vue
        return $this->twig->render('Admin/admin.html.twig');
    }
    public function ShowAllAction()
    {
        $renovmanager = new RenovManager();
        $renovs = $renovmanager->findAll();

        return $this->twig->render('Admin/admin.html.twig', [
            'renovs' => $renovs,
        ]);
    }
}