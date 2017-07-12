<?php

class Deck
{
    private $cards = [];

    public function __construct()
    {
        $this->makeDeck();
        shuffle($this->cards);
    }

    private function makeDeck() : void
    {
        foreach (EnumColors::getConstants() as $item)
        {
            $numberOfCards = 12;
            if ($item === EnumColors::SPECIAL) {
                $numberOfCards = 14;
            }

            $this->makeCards($item, $numberOfCards);
        }
    }

    private function makeCards(int $color, int $number) : void
    {
        while ($number > 0)
        {
            $this->cards[] = $color === EnumColors::SPECIAL ? new SpecialColor($color) : new GenericColor($color);
            $number--;
        }
    }

    public function getCards() : array
    {
        return $this->cards;
    }
}
