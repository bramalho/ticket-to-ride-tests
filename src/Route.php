<?php

class Route
{
    private $id;
    private $color;
    private $nSegments;
    private $cities = []; // array of 2 cities

    public function __construct(int $id, AbstractColor $color, int $nSegments, array $cities)
    {
        $this->validatePositiveInteger($id);
        $this->id = $id;

        $this->color = $color;

        $this->validateNSegments($nSegments);
        $this->nSegments = $nSegments;

        foreach($cities as $city) {
            $this->validateCity($city);
            $this->cities[] = $city;
        }
    }

    private function validatePositiveInteger(int $number) : void
    {
        if($number <= 0)
            throw new InvalidArgumentException('Invalid number');
    }

    private function validateNSegments(int $number) : void
    {
        if($number <= 0 || $number > 6)
            throw new InvalidArgumentException('Invalid number of segments');
    }

    private function validateCity($city) : void
    {
        if(!($city instanceof City))
            throw new InvalidArgumentException('Invalid City');
    }
    
}
