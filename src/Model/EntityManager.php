<?php


namespace Beltoise\Model;


class EntityManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }
}

