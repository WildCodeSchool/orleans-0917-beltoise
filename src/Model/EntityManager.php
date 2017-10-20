<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 20/10/17
 * Time: 17:16
 */

namespace Beltoise\Model;

class ConnectBD
{

    protected $pdo;
    public function __construct()
    {
        $this->pdo = new \PDO(DSN, USERNAME, PASSWORD);
    }

}
