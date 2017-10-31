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
    public function findAllPresentation()
    {
        $query = "SELECT * FROM presentation";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\Presentation::class);
    }
}