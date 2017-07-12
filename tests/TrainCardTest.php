<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers TrainCard
 */
class TrainCardTest extends TestCase
{
    /** @var  TrainCard */
    private $trainCard;

    public function testGetColor() : void
    {
        $this->trainCard = new TrainCard(new GenericColor(EnumColors::RED));
        $this->assertInstanceOf(AbstractColor::class, $this->trainCard->getColor());
    }

    public function validColorDataProvider() : array
    {
        return [
            'special'   => [new SpecialColor(EnumColors::SPECIAL)],
            'purple'    => [new GenericColor(EnumColors::PURPLE)],
            'white'     => [new GenericColor(EnumColors::WHITE)],
            'blue'      => [new GenericColor(EnumColors::BLUE)],
            'yellow'    => [new GenericColor(EnumColors::YELLOW)],
            'orange'    => [new GenericColor(EnumColors::ORANGE)],
            'black'     => [new GenericColor(EnumColors::BLACK)],
            'red'       => [new GenericColor(EnumColors::RED)],
            'green'     => [new GenericColor(EnumColors::GREEN)]
        ];
    }

    /**
     * @param $color
     * @dataProvider validColorDataProvider
     */
    public function testSetValidColor($color) : void
    {
        $this->trainCard = new TrainCard($color);
        $this->assertEquals($color, $this->trainCard->getColor());
    }
}
