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

        $this->validateTwoCities($cities);

        foreach($cities as $city) {
            $this->validateCity($city);
            $this->cities[] = $city;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return AbstractColor
     */
    public function getColor(): AbstractColor
    {
        return $this->color;
    }

    /**
     * @return int
     */
    public function getNSegments(): int
    {
        return $this->nSegments;
    }

    /**
     * @return array
     */
    public function getCities(): array
    {
        return $this->cities;
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

    private function validateTwoCities(array $cities)
    {
        if($cities[0] == $cities[1] || count($cities) !== 2)
        {
            throw new InvalidArgumentException('Invalid set of cities');
        }
    }

    public function calculatePoint() : int
    {
        switch ($this->nSegments) {
            case 1:
            case 2:
                return $this->nSegments;
            case 3:
                return 4;
            case 4:
                return 7;
            case 5:
                return 10;
            case 6:
                return 15;
        }
    }
}
