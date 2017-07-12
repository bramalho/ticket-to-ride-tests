<?php

class TrainCardCollection
{
    private $cards = [];

    public function getCards() : array
    {
        return $this->cards;
    }

    public function addCard(TrainCard $card) : void
    {
        $this->cards[] = $card;
    }

    public function getNumberOfCardsOfAColor(int $color) : int
    {
        $count = 0;
        /** @var TrainCard $card */
        foreach ($this->cards as $card) {
            if ($card->getColor()->isThisColor($color)) {
                $count++;
            }
        }

        return $count;
    }

    public function playNCardOfAColor(int $number, int $color) : void
    {
        if ($number > $this->getNumberOfCardsOfAColor($color)) {
            throw new InvalidArgumentException('Not enough cards of this color');
        }

        $i = 0;
        while ($i < $number) {
            $this->unsetCardByColor($color);
            $i++;
        }
    }

    private function unsetCardByColor(int $color) : void
    {
        /** @var TrainCard $card */
        foreach ($this->cards as $key => $card) {
            if ($card->getColor()->isThisColor($color)) {
                unset($this->cards[$key]);
                return;
            }
        }
    }
}
