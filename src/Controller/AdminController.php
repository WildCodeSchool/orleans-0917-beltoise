<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 20/10/17
 * Time: 17:17
 */

namespace Beltoise\Controller;


class AdminController extends Controller
{
    public function adminAction()
    {

        return $this->twig->render('Admin/admin.html.twig');
    }
}