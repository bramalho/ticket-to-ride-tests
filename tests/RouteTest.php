<?php

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /** @var $route Route */
    private $route;

    public function allPointsDataProvider() : array
    {
        return [
            '1' => [1, 1],
            '2' => [2, 2],
            '3' => [3, 4],
            '4' => [4, 7],
            '5' => [5, 10],
            '6' => [6, 15],
        ];
    }

    /**
     * @param $nSegments
     * @param $points
     * @dataProvider allPointsDataProvider
     */
    public function testCalculatePoints($nSegments, $points) : void
    {
        $this->route = new Route(
            1, new GenericColor(), $nSegments,
            [new City(EnumCity::VANCOUVER), new City(EnumCity::SEATTLE)]
        );

        $this->assertEquals($points, $this->route->calculatePoint());
    }

    public function validRouteDataProvider()
    {
        return
            [
                [1, new GenericColor(EnumColors::PURPLE), 2, [new City(EnumCity::VANCOUVER), new City(EnumCity::ATLANTA)]]
            ];
    }
}
