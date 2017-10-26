<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 24/10/17
 * Time: 16:40
 */

namespace Beltoise\Model;


class EntityManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }

}
