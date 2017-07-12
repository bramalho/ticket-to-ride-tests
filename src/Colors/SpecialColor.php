<?php

class SpecialColor extends AbstractColor
{
    public function setColor(int $color) : void
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
