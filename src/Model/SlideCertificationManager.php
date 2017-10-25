<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 24/10/17
 * Time: 16:45
 */

namespace Beltoise\Model;


class SlideCertificationManager extends EntityManager
{
    public function findAllLogos()
    {
        $query = "SELECT * FROM slide_certification WHERE role='certification'";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
    }

    public function findAllSlides()
    {
        $query = "SELECT * FROM slide_certification WHERE role='slide'";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
    }

    public function find(int $id) : SlideCertification
    {
        $query = "SELECT * FROM slide_certification WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $slideCertification = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
        return $slideCertification[0];
    }

    public function delete(SlideCertification $slideCertification)
    {
        $query = "DELETE FROM slide_certification WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $slideCertification->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}
