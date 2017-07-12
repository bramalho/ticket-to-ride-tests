<?php

class City
{
    private $city;

    public function __construct(int $city = null)
    {
        if ($city !== null) {
            $this->setCity($city);
        }
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        if (!in_array($city, EnumCity::getConstants())) {
            throw new InvalidArgumentException('No valid City');
        }

        $this->city = $city;
    }
}