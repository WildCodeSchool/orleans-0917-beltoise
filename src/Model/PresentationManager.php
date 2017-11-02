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

    public function findAllRenovation()
    {
        $query = "SELECT * FROM presentation WHERE section = 'RENOVATION'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function findAllMaconnerie()
    {
        $query = "SELECT * FROM presentation WHERE section = 'MACONNERIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function update(Presentation $presentation)
    {
        $query = "UPDATE presentation SET texte=:texte WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('texte', $presentation->getTexte(), \PDO::PARAM_STR);
        $statement->bindValue('id', $presentation->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function add(Presentation $presentation)
    {
        $query = "INSERT INTO presentation (texte, section) 
                  VALUES (:texte, :section)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('texte', $presentation->getTexte(), \PDO::PARAM_STR);
        $statement->bindValue('section', $presentation->getSection(), \PDO::PARAM_STR);
        $statement->execute();
    }

}