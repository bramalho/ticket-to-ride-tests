<?php

abstract class AbstractColor
{
    protected $color;

    public function getColor() : int
    {
        return $this->color;
    }

    public function setColor(int $color) : void {}

    public function isThisColor(int $color) : bool {}
}
