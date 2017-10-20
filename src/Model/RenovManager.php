<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 19/10/17
 * Time: 16:55
 */

namespace Beltoise\Model;

use Beltoise\Model\Renov;

class RenovManager extends EntityManager


{
    public function findAll()
    {
        $query = "SELECT * FROM renov";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, Renov::class);
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM renov WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $renovs = $statement->fetchAll(\PDO::FETCH_CLASS, Renov::class);
        return $renovs[0];
    }

}
