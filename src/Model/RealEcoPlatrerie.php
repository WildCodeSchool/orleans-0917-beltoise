<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 24/10/17
 * Time: 17:02
 */

namespace Beltoise\Model;

class RealEcoPlatrerie
{
    private $id;
    private $titre;
    private $image;
    private $section;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return RealEcoPlatrerie
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return RealEcoPlatrerie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return RealEcoPlatrerie
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     * @return RealEcoPlatrerie
     */
    public function setSection($section)
    {
        $this->section = $section;
        return $this;
    }


}