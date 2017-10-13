<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 13/10/17
 * Time: 10:07
 */

namespace Beltoise\model;


class Macon
{
    /**
     * table BDD Admin
     * @var
     */
    private $id;
    private $user;
    private $password;
    private $accesslevel;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAccesslevel()
    {
        return $this->accesslevel;
    }

    /**
     * @param mixed $accesslevel
     */
    public function setAccesslevel($accesslevel)
    {
        $this->accesslevel = $accesslevel;
    }

}

