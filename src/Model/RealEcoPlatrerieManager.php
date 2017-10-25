<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 24/10/17
 * Time: 17:06
 */

namespace Beltoise\Model;


class RealEcoPlatrerieManager extends EntityManager
{

    public function findAllPlatrerie()
    {
        $query = "SELECT * FROM realecoPlatrerie WHERE section = 2";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\RealEcoPlatrerie::class);
    }

    public function findAllRealEco()
    {
        $query = "SELECT * FROM realecoPlatrerie WHERE section = 1";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\RealEcoPlatrerie::class);
    }

}