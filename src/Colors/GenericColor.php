<?php

class GenericColor extends AbstractColor
{
    public function __construct(int $color = null)
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
