<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers GenericColor
 */
class GenericColorTest extends TestCase
{
    /** @var  GenericColor */
    private $genericColor;

    public function testGetColor() : void
    {
        $this->genericColor = new GenericColor(EnumColors::RED);

        $this->assertEquals(EnumColors::RED, $this->genericColor->getColor());
    }

    public function validColorDataProvider() : array
    {
        return [
            'purple'    => [EnumColors::PURPLE],
            'white'     => [EnumColors::WHITE],
            'blue'      => [EnumColors::BLUE],
            'yellow'    => [EnumColors::YELLOW],
            'orange'    => [EnumColors::ORANGE],
            'black'     => [EnumColors::BLACK],
            'red'       => [EnumColors::RED],
            'green'     => [EnumColors::GREEN]
        ];
    }

    /**
     * @param $validColor
     * @dataProvider validColorDataProvider
     */
    public function testSetValidColor($validColor) : void
    {
        $this->genericColor = new GenericColor($validColor);

        $this->assertEquals($validColor, $this->genericColor->getColor());
    }

    public function invalidColorDataProvider() : array
    {
        return [
            'special'   => [EnumColors::SPECIAL],
            '99'        => [99],
            '123'       => [123]
        ];
    }

    /**
     * @param $invalidColor
     * @dataProvider invalidColorDataProvider
     */
    public function testSetInvalidColor($invalidColor) : void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->genericColor = new GenericColor($invalidColor);
    }

    public function testIsThisColorTrue() : void
    {
        $this->genericColor = new GenericColor(EnumColors::RED);

        $this->assertTrue($this->genericColor->isThisColor(EnumColors::RED));
    }

    public function testIsThisColorFalse() : void
    {
        $this->genericColor = new GenericColor(EnumColors::RED);

        $this->assertFalse($this->genericColor->isThisColor(EnumColors::SPECIAL));
    }
}
