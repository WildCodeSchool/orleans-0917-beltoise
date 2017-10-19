<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 19/10/17
 * Time: 16:33
 */

namespace Beltoise\Model;


class EntityManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USER, PASS);
    }

}