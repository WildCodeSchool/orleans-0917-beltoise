<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 24/10/17
 * Time: 16:43
 */

namespace Beltoise\Model;


class RenovManager extends EntityManager
{
    public function findAll()
    {
        $query = "SELECT * FROM renov";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renov::class);
    }

    public function find(int $id): Renov
    {
        $query = "SELECT * FROM renov WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $persons = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renov::class);
        return $persons[0];
    }

    public function insert(Renov $renov)
    {
        $query = "INSERT INTO renov 
                  (imageBefore, imageAfter, text, title) 
                  VALUES (:image_before, :image_after, :text, :title)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('imageBefore', $renov->getImageBefore(), \PDO::PARAM_STR);
        $statement->bindValue('imageAfter', $renov->getImageAfter(), \PDO::PARAM_STR);
        $statement->bindValue('text', $renov->getText(), \PDO::PARAM_STR);
        $statement->bindValue('title', $renov->getTitle(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function update(Renov $renov)
    {
        $query = "UPDATE renov SET text=:text, title=:title WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('text', $renov->getText(), \PDO::PARAM_STR);
        $statement->bindValue('title', $renov->getTitle(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(Renov $renov)
    {
        $query = "DELETE FROM renov WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $renov->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

}