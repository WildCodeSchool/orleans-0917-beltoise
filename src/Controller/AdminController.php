<?php

namespace Beltoise\Controller;



class AdminController extends Controller
{
    public function showAllAction()
    {
        return $this->twig->render('Admin/admin.html.twig');
    }
}

