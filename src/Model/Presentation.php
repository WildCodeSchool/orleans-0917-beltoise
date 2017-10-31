<?php
/**
 * Created by PhpStorm.
 * User: wilder1
 * Date: 31/10/17
 * Time: 09:51
 */

namespace Beltoise\Model;


class Presentation
{
    private $id;
    private $texte;
    private $section;

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Presentation
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     * @return Presentation
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }
    
}