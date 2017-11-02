<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 24/10/17
 * Time: 16:43
 */

namespace Beltoise\Model;


/**
 * Class RenovationManager
 * @package Beltoise\Model
 */
class RenovationManager extends EntityManager
{
    /**
     * @return array
     *
     */
    public function findAllRenovations()
    {
        $query = "SELECT * FROM renovation";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renovation::class);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $query = "SELECT * FROM renovation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $renovations = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Renovation::class);
        return $renovations[0];
    }

    /**
     * @param Renovation $renovation
     */
    public function insert(Renovation $renovation)
    {
        $query = "INSERT INTO renovation
                  (imageBefore, imageAfter, text, title) 
                  VALUES (:image_before, :image_after, :text, :title)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('image_before', $renovation->getImageBefore(), \PDO::PARAM_STR);
        $statement->bindValue('image_after', $renovation->getImageAfter(), \PDO::PARAM_STR);
        $statement->bindValue('text', $renovation->getText(), \PDO::PARAM_STR);
        $statement->bindValue('title', $renovation->getTitle(), \PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * @param Renovation $renovation
     */
    public function delete(Renovation $renovation)
    {
        $query = "DELETE FROM renovation WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $renovation->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }
}