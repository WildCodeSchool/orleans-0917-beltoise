<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 19/10/17
 * Time: 17:26
 */

namespace Beltoise\Controller;

use Beltoise\model\EntityManager;
use Beltoise\model\Renov;
use Beltoise\model\RenovManager;

class RenovImageController extends Controller
{
    public function AdminAction($id)
    {
        $renovManager = new RenovManager();
        $renov = $renovManager->find($id);

        return $this->twig->render('Admin/admin.html.twig', [
            'renov' => $renov,
        ]);
    }
}