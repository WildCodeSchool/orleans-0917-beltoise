<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 24/10/17
 * Time: 16:43
 */

namespace Beltoise\Model;


class RenovationManager extends EntityManager
{
    public function findAll()
    {
        $query = "SELECT * FROM renovation";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renovation::class);
    }

    public function find(int $id): Renovation
    {
        $query = "SELECT * FROM renovation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $persons = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renovation::class);
        return $persons[0];
    }

    public function insert(Renovation $renovation)
    {
        $query = "INSERT INTO renovation
                  (imageBefore, imageAfter, text) 
                  VALUES (:image_before, :image_after, :text)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('image_before', $renovation->getImageBefore(), \PDO::PARAM_STR);
        $statement->bindValue('image_after', $renovation->getImageAfter(), \PDO::PARAM_STR);
        $statement->bindValue('text', $renovation->getText(), \PDO::PARAM_STR);
        $statement->execute();
    }



    public function delete(Renovation $renovation)
    {
        $query = "DELETE FROM renovation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $renovation->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

}