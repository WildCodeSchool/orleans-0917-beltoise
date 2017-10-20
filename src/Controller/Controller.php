<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 13/10/17
 * Time: 09:41
 */

namespace Beltoise\Controller;


class Controller
{
    protected  $twig;

    /**
     * Controller constructor.
     */
    public function __construct ()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../View');
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false,
        ));
    }
}