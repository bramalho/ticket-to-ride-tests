<?php

class GenericColor extends AbstractColor
{
    private $color;

    public function getColor() : int
    {
        return $this->color;
    }

    public function setColor(int $color) : void
    {
        if (!in_array($color, EnumColors::getConstants()) || $color === EnumColors::SPECIAL) {
            throw new InvalidArgumentException('No valid Color');
        }

        $this->color = $color;
    }

    public function isThisColor(int $color) : bool
    {
        return $this->color === $color;
    }
}
