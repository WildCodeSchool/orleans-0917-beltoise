<?php

namespace Beltoise\Controller;


use Beltoise\Model\Form;
use Beltoise\Model\FormManager;

/**
 * Class FormController
 * @package Beltoise\Controller
 */
class FormController extends Controller
{
    /**
     * @return string
     */
    public function showAll()
    {
        $formManager = new FormManager();
        $formReceptionAddress = $formManager->findAddress();

        if (!empty($_POST['formReceptionAddress'])) {
            $form = new Form();
            $form->setReceptionAddress($_POST['formReceptionAddress']);

            $formManager->update($form);

            header('Location: index.php?route=adminForm');
            exit;
        }

        return $this->twig->render('Admin/adminForm.html.twig', [
            'formReceptionAddress' => $formReceptionAddress,
        ]);
    }
}
