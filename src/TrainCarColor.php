<?php

class TrainCarColor extends AbstractColor
{
    private $color;

    public function getColor() : int
    {
        return $this->color;
    }

    public function setColor(int $color) : void
    {
        if (!in_array($color, EnumTrainCarColors::getConstants()) || $color === EnumTrainCarColors::WILD) {
            throw new InvalidArgumentException('No valid Color for Train Car Color');
        }

        $this->color = $color;
    }

    public function isThisColor(int $color) : bool
    {
        return $this->color === $color;
    }
}
