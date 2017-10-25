<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 24/10/17
 * Time: 17:06
 */

namespace Beltoise\Model;


class RealisationManager extends EntityManager
{

    public function findAllPlatrerie()
    {
        $query = "SELECT * FROM realisation WHERE section = 'PLATRERIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Realisation::class);
    }

    public function findAllRealEco()
    {
        $query = "SELECT * FROM realisation WHERE section = 'ECOLOGIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Realisation::class);
    }

    public function delete(realisation $realisation)
    {
        $query = "DELETE FROM realisation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $realisation->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function find(int $id) : realisation
    {
        $query = "SELECT * FROM realisation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $realisation = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Realisation::class);
        return $realisation[0];
    }

    public function insertRealisation(realisation $realisation)
    {
        $query = "INSERT INTO realisation  (titre, image, texte, section) 
                  VALUES (:titre, :image, :texte, :section)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('titre', $realisation->getTitre(), \PDO::PARAM_STR);
        $statement->bindValue('image', $realisation->getImage(), \PDO::PARAM_STR);
        $statement->bindValue('texte', $realisation->getTexte(), \PDO::PARAM_STR);
        $statement->bindValue('section', $realisation->getSection(), \PDO::PARAM_INT);
        $statement->execute();
    }

}