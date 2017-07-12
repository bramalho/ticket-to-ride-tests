<?php

class TrainCard
{
    /** @var  AbstractColor */
    private $color;

    public function __construct(AbstractColor $color)
    {
        $this->color = $color;
    }

    public function getColor() : AbstractColor
    {
        return $this->color;
    }
}
