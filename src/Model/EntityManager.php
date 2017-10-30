<?php


namespace Beltoise\Model;


class EntityManager
{
    const UPLOAD_DIR = 'assets/uploads/';
    const UPLOAD_SIZELIMIT = '2000000';

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }
}

