<?php


namespace Beltoise\Model;


class EntityManager
{
    const UPLOAD_DIR = 'assets/uploads/';

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }
}

