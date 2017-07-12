<?php

class SpecialColor extends AbstractColor
{
    public function __construct(int $color = null)
    {
        if ($color !== EnumColors::SPECIAL) {
            throw new InvalidArgumentException('No valid Color');
        }

        $this->color = $color;
    }

    public function isThisColor(int $color) : bool
    {
        return in_array($color, EnumColors::getConstants());
    }
}
