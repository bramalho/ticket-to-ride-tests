<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Player
 */
class PlayerTest extends TestCase
{
    /** @var Player $player */
    private $player;

    protected function setUp() : void
    {
        $this->player = new Player(1, 'Player One');
    }

    protected function tearDown() : void
    {
        unset($this->player);
    }

    public function testIfGetsId() : void
    {
        $this->assertEquals(1, $this->player->getId());
    }

    public function testIfGetsName() : void
    {
        $this->assertEquals('Player One', $this->player->getName());
    }

    public function testGetsEmptyCards() : void
    {
        $this->assertEmpty($this->player->getCardCollection()->getCards());
    }

    public function testAddNewCard() : void
    {
        $this->player->addCard(new TrainCard(new GenericColor(EnumColors::RED)));

        $this->assertEquals(1, count($this->player->getCardCollection()->getCards()));
    }
}
