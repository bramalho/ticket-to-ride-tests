<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers City
 */
class CityTest extends TestCase
{
    /** @var  City */
    private $city;

    protected function setUp() : void
    {
        $this->city = new City();
    }

    protected function tearDown() : void
    {
        unset($this->city);
    }

    public function testGetCity() : void
    {
        $this->city->setCity(EnumCity::VANCOUVER);

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
        $this->city->setCity($validCity);

        $this->assertEquals($validCity, $this->city->getCity());
    }

    public function invalidCityDataProvider() : array
    {
        return [
            'special'   => ['special'],
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

        $this->city->setCity($invalidCity);
    }
}
