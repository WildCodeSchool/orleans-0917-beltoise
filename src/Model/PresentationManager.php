<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 31/10/17
 * Time: 09:53
 */

namespace Beltoise\Model;


class PresentationManager extends EntityManager
{
    public function findAllAccueil()
    {
        $query = "SELECT * FROM presentation WHERE section = 'ACCUEIL'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function findAllPlatrerie()
    {
        $query = "SELECT * FROM presentation WHERE section = 'PLATRERIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function findAllRealEco()
    {
        $query = "SELECT * FROM presentation WHERE section = 'ECOLOGIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function findAllRnovation()
    {
        $query = "SELECT * FROM presentation WHERE section = 'RENOVATION'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

}