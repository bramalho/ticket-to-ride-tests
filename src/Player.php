<?php

class Player
{
    private $id;
    private $name;
    /** @var TrainCardCollection $cardCollection */
    private $cardCollection;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cardCollection = new TrainCardCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getCardCollection() : TrainCardCollection
    {
        return $this->cardCollection;
    }

    public function addCard(TrainCard $card) : void
    {
        $this->cardCollection->addCard($card);
    }
}