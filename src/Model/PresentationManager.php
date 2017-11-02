<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 02/11/17
 * Time: 14:51
 */

namespace Beltoise\Model;

/**
 * Class PresentationManager
 * @package Beltoise\Model
 */
class PresentationManager extends EntityManager
{

    /**
     * @return array
     */
    public function findAllAccueil()
    {
        $query = "SELECT * FROM presentation WHERE section = 'ACCUEIL'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    /**
     * @return array
     */
    public function findAllPlatrerie()
    {
        $query = "SELECT * FROM presentation WHERE section = 'PLATRERIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    /**
     * @return array
     */
    public function findAllRealEco()
    {
        $query = "SELECT * FROM presentation WHERE section = 'ECOLOGIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    /**
     * @return array
     */
    public function findAllRenovation()
    {
        $query = "SELECT * FROM presentation WHERE section = 'RENOVATION'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    /**
     * @return array
     */
    public function findAllMaconnerie()
    {
        $query = "SELECT * FROM presentation WHERE section = 'MACONNERIE'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    public function findAllPrestation()
    {
        $query = "SELECT * FROM presentation WHERE section = 'PRESTATION'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }

    /**
     * @param Presentation $presentation
     */
    public function update(Presentation $presentation)
    {
        $query = "UPDATE presentation SET texte=:texte WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('texte', $presentation->getTexte(), \PDO::PARAM_STR);
        $statement->bindValue('id', $presentation->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }


}