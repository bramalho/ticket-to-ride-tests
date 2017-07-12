<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers ScoreRoute
 */
class TestScoreRoute extends TestCase
{
    /** @var $scoreRoute ScoreRoute */
    private $scoreRoute;

    public function allPointsDataProvider() : array
    {
        return [
            [1, 1],
            [2, 2],
            [3, 4],
            [4, 7],
            [5, 10],
            [6, 15],
        ];
    }

    /**
     * @param $nSegments
     * @param $points
     * @dataProvider allPointsDataProvider
     */
    public function testCalculatePoints($nSegments, $points) : void
    {
        $route = new Route(
            1, new GenericColor(EnumColors::YELLOW), $nSegments,
            [new City(EnumCity::VANCOUVER), new City(EnumCity::SEATTLE)]
        );

        $this->scoreRoute = new ScoreRoute($route);

        $this->assertEquals($points, $this->scoreRoute->getScore());
    }
}
