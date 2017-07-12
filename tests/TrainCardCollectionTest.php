<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers TrainCardCollection
 */
class TrainCardCollectionTest extends TestCase
{
    /** @var $trainCardCollection TrainCardCollection */
    private $trainCardCollection;

    protected function setUp() : void
    {
        $this->trainCardCollection = new TrainCardCollection();
    }

    protected function tearDown() : void
    {
        unset($this->trainCardCollection);
    }

    public function testCollectionStartEmpty() : void
    {
        $this->assertEmpty($this->trainCardCollection->getCards());
    }

    public function testAddCardToCollection() : void
    {
        $card = new TrainCard(new GenericColor(EnumColors::RED));
        $this->trainCardCollection->addCard($card);

        $this->assertEquals([$card], $this->trainCardCollection->getCards());
    }

    public function testGetNumberOfCardsOfAGenericColor() : void
    {
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));

        $this->assertEquals(5, $this->trainCardCollection->getNumberOfCardsOfAColor(EnumColors::RED));
    }

    public function testGetNumberOfCardsWithASpecialColor() : void
    {
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new SpecialColor(EnumColors::SPECIAL)));

        $this->assertEquals(5, $this->trainCardCollection->getNumberOfCardsOfAColor(EnumColors::RED));
    }

    public function testPlayOneCardOfAColor() : void
    {
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->addCard(new TrainCard(new SpecialColor(EnumColors::SPECIAL)));

        $this->trainCardCollection->playNCardOfAColor(2, EnumColors::RED);

        $total = count($this->trainCardCollection->getCards());

        $this->assertEquals(3, $total);
    }

    public function testPlayMoreCardsOfAColor() : void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->trainCardCollection->addCard(new TrainCard(new GenericColor(EnumColors::RED)));
        $this->trainCardCollection->playNCardOfAColor(2, EnumColors::RED);
    }
}
