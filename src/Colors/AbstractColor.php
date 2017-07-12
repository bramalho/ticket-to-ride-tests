<?php

abstract class AbstractColor
{
    protected $color;

    public function __construct(int $color = null)
    {
        if ($color !== null) {
            $this->color = $color;
        }
    }

    public function getColor() : int
    {
        return $this->color;
    }

    public function isThisColor(int $color) : bool {}
}
