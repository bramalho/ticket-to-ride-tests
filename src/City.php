<?php

/**
 * Created by PhpStorm.
 * User: ritacatarino
 * Date: 12/07/2017
 * Time: 12:23
 */
class City
{
    private $city;

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