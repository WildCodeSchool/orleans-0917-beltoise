<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 19/10/17
 * Time: 17:03
 */

namespace Beltoise\Model;


class Renov
{
    private $id;
    private $image_before;
    private $image_after;
    private $text;

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
    public function getImageBefore()
    {
        return $this->image_before;
    }

    /**
     * @param mixed $image_before
     */
    public function setImageBefore($image_before)
    {
        $this->image_before = $image_before;
    }

    /**
     * @return mixed
     */
    public function getImageAfter()
    {
        return $this->image_after;
    }

    /**
     * @param mixed $image_after
     */
    public function setImageAfter($image_after)
    {
        $this->image_after = $image_after;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}