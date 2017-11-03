<?php

namespace Beltoise\Model;

/**
 * Class Form
 * @package Beltoise\Model
 */
class Form
{
    /**
     * @var string
     */
    private $reception_address;

    /**
     * @return string
     */
    public function getReceptionAddress(): string
    {
        return $this->reception_address;
    }

    /**
     * @param string $reception_address
     * @return Form
     */
    public function setReceptionAddress(string $reception_address): Form
    {
        $this->reception_address = $reception_address;
        return $this;
    }
}
