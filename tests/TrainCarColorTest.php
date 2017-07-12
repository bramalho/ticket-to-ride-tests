<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers TrainCarColor
 */
class TrainCarColorTest extends TestCase
{
    /** @var  TrainCarColor */
    private $trainCarColor;

    protected function setUp() : void
    {
        $this->trainCarColor = new TrainCarColor();
    }

    protected function tearDown() : void
    {
        unset($this->trainCarColor);
    }

    public function testGetColor() : void
    {
        $this->trainCarColor->setColor(EnumTrainCarColors::RED);

        $this->assertEquals(EnumTrainCarColors::RED, $this->trainCarColor->getColor());
    }

    public function validColorDataProvider() : array
    {
        return [
            'green'     => [EnumTrainCarColors::GREEN],
            'yellow'    => [EnumTrainCarColors::YELLOW],
            'red'       => [EnumTrainCarColors::RED]
        ];
    }

    /**
     * @param $validColor
     * @dataProvider validColorDataProvider
     */

    public function testSetValidColor($validColor) : void
    {
        $this->trainCarColor->setColor($validColor);

        $this->assertEquals($validColor, $this->trainCarColor->getColor());
    }

    public function invalidColorDataProvider() : array
    {
        return [
            'wild'      => [EnumTrainCarColors::WILD],
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

        $this->trainCarColor->setColor($invalidColor);
    }

    public function testIsThisColorTrue() : void
    {
        $this->trainCarColor->setColor(EnumTrainCarColors::RED);

        $this->assertTrue($this->trainCarColor->isThisColor(EnumTrainCarColors::RED));
    }

    public function testIsThisColorFalse() : void
    {
        $this->trainCarColor->setColor(EnumTrainCarColors::RED);

        $this->assertFalse($this->trainCarColor->isThisColor(EnumTrainCarColors::WILD));
    }
}
