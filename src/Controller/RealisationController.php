<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 30/10/17
 * Time: 14:52
 */

namespace Beltoise\Controller;

use Beltoise\Model\RealisationManager;
use Beltoise\Model\Realisation;
use Beltoise\Model\Presentation;
use Beltoise\Service\UploadImageManager;
use Beltoise\Model\PresentationManager;

class RealisationController extends Controller
{

    public function showAdminPlatrerie()
    {
        $platrerie = new Realisation();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $platrerie->setSection('PLATRERIE');
            $platrerie->setTitre($_POST['titre']);
            $platrerie->setTexte($_POST['texte']);

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $platrerie->setImage($uploadImageManager->getImageName());

                $realisationManager = new RealisationManager();
                $realisationManager->insert($platrerie);

                header('Location: index.php?route=adminPlatrerie');
                exit;
            }
        }

        $realisationManager = new RealisationManager();
        $platreries = $realisationManager->findAllPlatrerie();
        $presentationPlatrerieManager = new PresentationManager();
        $presentationPlatreries = $presentationPlatrerieManager->findAllPlatrerie();
        return $this->twig->render('Admin/adminPlatrerie.html.twig', [
            'platreries' => $platreries,
            'uploadErrors' => $uploadErrors,
            'presentationPlatreries' => $presentationPlatreries,
        ]);
    }

    public function showAdminRealEco()
    {
        $realEcol = new Realisation();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $realEcol->setSection('ECOLOGIE');
            $realEcol->setTitre($_POST['titre']);
            $realEcol->setTexte($_POST['texte']);

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $realEcol->setImage($uploadImageManager->getImageName());

                $realisationManager = new RealisationManager();
                $realisationManager->insert($realEcol);

                header('Location: index.php?route=adminRealEco');
                exit;
            }
        }

        $realisationManager = new RealisationManager();
        $realEcos = $realisationManager->findAllRealEco();
        return $this->twig->render('Admin/adminRealeco.html.twig', [
            'realEcos' => $realEcos,
            'uploadErrors' => $uploadErrors,
        ]);
    }

    public function deletePlatrerieAction()
    {
        if (!empty($_POST['id'])) {
            $realisationManager = new RealisationManager();
            $platrerie = $realisationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $platrerie->getImage())) {
                $realisationManager->delete($platrerie);
                unlink('assets/uploads/' . $platrerie->getImage());
            }
            header('Location: index.php?route=adminPlatrerie');
        }
    }

    public function deleteRealEcoAction()
    {
        if (!empty($_POST['id'])) {
            $realisationManager = new RealisationManager();
            $realEco = $realisationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $realEco->getImage())) {
                $realisationManager->delete($realEco);
                unlink('assets/uploads/' . $realEco->getImage());
            }
            header('Location: index.php?route=adminRealEco');
        }
    }

    public function presentationPlatrerieAction()
    {
        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->findAllPlatrerie();
        if (!empty($presentation)) {
            $presentation = $presentation[0];
            $presentation->setTexte($_POST['texte']);
            $presentationManager->update($presentation);
            header('Location: index.php?route=adminPlatrerie');
        } else {
            $presentation = new Presentation();
            $presentation->setTexte($_POST['texte']);
            $presentation->setSection($_POST['section']);
            $presentationManager->add($presentation);
        }
    }
}