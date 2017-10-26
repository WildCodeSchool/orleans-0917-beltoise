<?php

namespace Beltoise\Service;

class uploadFile
{
    static function upload(array $infoFiles)
    {
        $infoFiles = current($infoFiles);
//        $allowedExtensions = ['jpg', 'png', 'gif'];
        $name = $infoFiles['name'];
        $errors = [];

//        if (!in_array(pathinfo($name, PATHINFO_EXTENSION), $allowedExtensions)) {
//            $errors['type'] = "Le type de $name n'est pas valide.";
//        }

        if (count($errors) == 0) {
            $name = "image" . uniqid() . "." . pathinfo($name, PATHINFO_EXTENSION);
            move_uploaded_file($infoFiles['tmp_name'], 'assets/uploads/' . $name);
        }
//        else {
//            foreach ($errors as $error) {
//                echo $error . '</br>';
//            }
//        }
        return $name;
    }
}
