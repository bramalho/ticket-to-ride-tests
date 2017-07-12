<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers SpecialColor
 */
class SpecialColorTest extends TestCase
{
    /** @var  SpecialColor */
    private $specialColor;

    protected function setUp() : void
    {
        $this->specialColor = new SpecialColor();
    }

    protected function tearDown() : void
    {
        unset($this->specialColor);
    }

    public function testGetColor() : void
    {
        $this->specialColor->setColor(EnumColors::SPECIAL);

        $this->assertEquals(EnumColors::SPECIAL, $this->specialColor->getColor());
    }

    public function testSetValidColor() : void
    {
        $this->specialColor->setColor(EnumColors::SPECIAL);

        $this->assertEquals(EnumColors::SPECIAL, $this->specialColor->getColor());
    }

    public function invalidColorDataProvider() : array
    {
        return [
            'purple'    => [EnumColors::PURPLE],
            'white'     => [EnumColors::WHITE],
            'blue'      => [EnumColors::BLUE],
            'yellow'    => [EnumColors::YELLOW],
            'orange'    => [EnumColors::ORANGE],
            'black'     => [EnumColors::BLACK],
            'red'       => [EnumColors::RED],
            'green'     => [EnumColors::GREEN],
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

        $this->specialColor->setColor($invalidColor);
    }

    public function testIsThisColorTrue() : void
    {
        $this->specialColor->setColor(EnumColors::SPECIAL);

        $this->assertTrue($this->specialColor->isThisColor(EnumColors::SPECIAL));
    }

    public function allColorsDataProvider() : array
    {
        return [
            'sepecial'  => [EnumColors::SPECIAL],
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
     * @param $color
     * @dataProvider allColorsDataProvider
     */
    public function testIsThisAnyColorTrue($color) : void
    {
        $this->specialColor->setColor(EnumColors::SPECIAL);

        $this->assertTrue($this->specialColor->isThisColor($color));
    }

    public function testIsThisColorFalse() : void
    {
        $this->specialColor->setColor(EnumColors::SPECIAL);

        $this->assertFalse($this->specialColor->isThisColor(99));
    }
}
