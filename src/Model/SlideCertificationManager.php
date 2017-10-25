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
}
