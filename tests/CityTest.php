<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers City
 */
class CityTest extends TestCase
{
    /** @var $city City */
    private $city;

    public function testSetCity() : void
    {
        $this->city = new City(EnumCity::VANCOUVER);

        $this->assertEquals(EnumCity::VANCOUVER, $this->city->getCity());
    }

    public function validCityDataProvider() : array
    {
        return [
            'vancouver'    => [EnumCity::VANCOUVER],
            'seattle'      => [EnumCity::SEATTLE],
            'portland'     => [EnumCity::PORTLAND],
            'sanfrancisco' => [EnumCity::SANFRANCISCO],
            'losangeles'   => [EnumCity::LOSANGELES],
            'saltlake'     => [EnumCity::SALTLAKE],
            'lasvegas'     => [EnumCity::LASVEGAS],
            'phoenix'      => [EnumCity::PHOENIX],
            'helena'       => [EnumCity::HELENA],
            'calgary'      => [EnumCity::CALGARY]
        ];
    }

    /**
     * @param $validCity
     * @dataProvider validCityDataProvider
     */
    public function testSetValidCity($validCity) : void
    {
        $this->city = new City($validCity);

        $this->assertEquals($validCity, $this->city->getCity());
    }

    public function invalidCityDataProvider() : array
    {
        return [
            '99'        => [99],
            '123'       => [123]
        ];
    }

    /**
     * @param $invalidCity
     * @dataProvider invalidCityDataProvider
     */
    public function testSetInvalidCity($invalidCity) : void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->city = new City($invalidCity);
    }
}
