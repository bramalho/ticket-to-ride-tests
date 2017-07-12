<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers GenericColor
 */
class GenericColorTest extends TestCase
{
    /** @var  GenericColor */
    private $genericColor;

    protected function setUp() : void
    {
        $this->genericColor = new GenericColor();
    }

    protected function tearDown() : void
    {
        unset($this->genericColor);
    }

    public function testGetColor() : void
    {
        $this->genericColor->setColor(EnumColors::RED);

        $this->assertEquals(EnumColors::RED, $this->genericColor->getColor());
    }

    public function validColorDataProvider() : array
    {
        return [
            [EnumColors::PURPLE],
            [EnumColors::WHITE],
            [EnumColors::BLUE],
            [EnumColors::YELLOW],
            [EnumColors::ORANGE],
            [EnumColors::BLACK],
            [EnumColors::RED],
            [EnumColors::GREEN]
        ];
    }

    /**
     * @param $validColor
     * @dataProvider validColorDataProvider
     */
    public function testSetValidColor($validColor) : void
    {
        $this->genericColor->setColor($validColor);

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

        $this->genericColor->setColor($invalidColor);
    }

    public function testIsThisColorTrue() : void
    {
        $this->genericColor->setColor(EnumColors::RED);

        $this->assertTrue($this->genericColor->isThisColor(EnumColors::RED));
    }

    public function testIsThisColorFalse() : void
    {
        $this->genericColor->setColor(EnumColors::RED);

        $this->assertFalse($this->genericColor->isThisColor(EnumColors::SPECIAL));
    }
}
