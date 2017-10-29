<?php

namespace Beltoise\Service;

use Beltoise\Model\EntityManager;

class UploadImageManager extends EntityManager
{
    const SIZELIMIT = '1000000';
    private $imageName;
    private $image;

    /**
     * @return mixed
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param mixed $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param array $imageFile
     * @return array
     */
    public function imageUpload(array $imageFile)
    {
        $imageFile = current($imageFile);
        $uploadErrors = [];

        $fileUploadErrors = [
            0 => "Aucune erreur détectée.",
            1 => "L'image est trop lourde.",
            2 => "L'image est trop lourde.",
            3 => "Le fichier n'a été que partiellement téléchargé.",
            4 => "Aucun fichier n'a été téléchargé.",
            6 => "Un dossier temporaire est manquant, contactez l'administrateur du site.",
            7 => "Échec de l'écriture du fichier sur le disque, contactez l'administrateur du site.",
            8 => "Erreur inconnue, contactez l'administrateur du site.",
        ];

        if (!empty($imageFile) && !$imageFile['error']) {
            $imageName = "image" . uniqid();
            $extension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

            if ($imageFile['size'] > self::SIZELIMIT) {
                $uploadErrors[] = "L'image est trop lourde.";
            }

            $allowedMimes = ['image/jpeg', 'image/png'];
            if (!in_array(mime_content_type($imageFile['tmp_name']), $allowedMimes)) {
                $uploadErrors[] = "Seuls les formats jpg et png sont autorisés.";
            }

            if (empty($uploadErrors)) {
                $this->setImageName($imageName . '.' . $extension);
                move_uploaded_file($imageFile['tmp_name'], EntityManager::UPLOAD_DIR . $imageName . '.' . $extension);
            }
        }

        if ($imageFile['error']){
            $uploadErrors[] = $fileUploadErrors[$imageFile['error']];
        }

        if (empty($imageFile['name'])) {
            $uploadErrors[] = "Vous devez envoyer une image.";
        }

        return $uploadErrors;
    }
}
