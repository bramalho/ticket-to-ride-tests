<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers TrainCar
 */
class TrainCarTest extends TestCase
{
    /** @var  TrainCar */
    private $trainCar;

    protected function setUp() : void
    {
        $this->trainCar = new TrainCar();
    }

    protected function tearDown() : void
    {
        unset($this->trainCar);
    }
}
