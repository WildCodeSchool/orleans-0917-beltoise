<?php


namespace Beltoise\Model;


/**
 * Class EntityManager
 * @package Beltoise\Model
 */
class EntityManager
{
    const UPLOAD_DIR = 'assets/uploads/';
    const UPLOAD_SIZELIMIT = '2000000';
    const PHPERRORTAB = [
        0 => "Aucune erreur détectée.",
        1 => "L'image est trop lourde. (2 Mo maximum)",
        2 => "L'image est trop lourde. (2 Mo maximum)",
        3 => "Le fichier n'a été que partiellement téléchargé.",
        4 => "Aucun fichier n'a été téléchargé.",
        6 => "Un dossier temporaire est manquant, contactez l'administrateur du site.",
        7 => "Échec de l'écriture du fichier sur le disque, contactez l'administrateur du site.",
        8 => "Erreur inconnue, contactez l'administrateur du site.",
    ];

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }
}

