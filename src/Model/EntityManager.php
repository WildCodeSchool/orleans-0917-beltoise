<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 24/10/17
 * Time: 17:34
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