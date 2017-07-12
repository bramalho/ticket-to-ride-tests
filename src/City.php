<?php

class City
{
    private $city;

    public function __construct(int $city = null)
    {
        if (!in_array($city, EnumCity::getConstants())) {
            throw new InvalidArgumentException('No valid City');
        }

        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
}
