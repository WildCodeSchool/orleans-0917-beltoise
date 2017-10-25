<?php

namespace Beltoise\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->twig->render('Admin/admin.html.twig');
    }
}