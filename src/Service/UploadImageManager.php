<?php

namespace Beltoise\Service;

use Beltoise\Model\EntityManager;

class UploadImageManager extends EntityManager
{

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

        if (!empty($imageFile) && !$imageFile['error']) {
            $imageName = "image" . uniqid();
            $extension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

            if ($imageFile['size'] > EntityManager::UPLOAD_SIZELIMIT) {
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

        // Récuếration de l'erreur PHP si elle existe
        if ($imageFile['error']) {
            $uploadErrors[] = self::PHPERRORTAB[$imageFile['error']];
        }

        if (empty($imageFile['name'])) {
            $uploadErrors[] = "Vous devez envoyer une image.";
        }

        return $uploadErrors;
    }

    public function imageUploadBefore(array $imageFile)
    {
        $uploadErrors = [];



        if (!empty($imageFile) && !$imageFile['error']) {
            $imageName = "image" . uniqid();
            $extension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

            if ($imageFile['size'] > EntityManager::UPLOAD_SIZELIMIT) {
                $uploadErrors[] = "L'image avant est trop lourde.";
            }

            $allowedMimes = ['image/jpeg', 'image/png'];
            if (!in_array(mime_content_type($imageFile['tmp_name']), $allowedMimes)) {
                $uploadErrors[] = "Image avant : seuls les formats jpg et png sont autorisés.";
            }

            if (empty($uploadErrors)) {
                $this->setImageName($imageName . '.' . $extension);
                move_uploaded_file($imageFile['tmp_name'], EntityManager::UPLOAD_DIR . $imageName . '.' . $extension);
            }
        }

        // Récuếration de l'erreur PHP si elle existe
        if ($imageFile['error']) {
            $uploadErrors[] = 'erreur image avant :' . self::PHPERRORTAB[$imageFile['error']];
        }

        if (empty($imageFile['name'])) {
            $uploadErrors[] = "Vous devez envoyer une image.";
        }

        return $uploadErrors;
    }
    public function imageUploadAfter(array $imageFile)
    {
        $uploadErrors = [];

        if (!empty($imageFile) && !$imageFile['error']) {
            $imageName = "image" . uniqid();
            $extension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

            if ($imageFile['size'] > EntityManager::UPLOAD_SIZELIMIT) {
                $uploadErrors[] = "L'image après est trop lourde.";
            }

            $allowedMimes = ['image/jpeg', 'image/png'];
            if (!in_array(mime_content_type($imageFile['tmp_name']), $allowedMimes)) {
                $uploadErrors[] = "images après : seuls les formats jpg et png sont autorisés.";
            }

            if (empty($uploadErrors)) {
                $this->setImageName($imageName . '.' . $extension);
                move_uploaded_file($imageFile['tmp_name'], EntityManager::UPLOAD_DIR . $imageName . '.' . $extension);
            }
        }

        // Récuếration de l'erreur PHP si elle existe
        if ($imageFile['error']) {
            $uploadErrors[] = 'erreur image après : '  . self::PHPERRORTAB[$imageFile['error']];
        }

        if (empty($imageFile['name'])) {
            $uploadErrors[] = "Vous devez envoyer une image.";
        }

        return $uploadErrors;
    }
}
