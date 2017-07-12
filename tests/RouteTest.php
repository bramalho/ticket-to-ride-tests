<?php

use PHPUnit\Framework\TestCase;

/**
 * Class RouteTest
 * @covers Route
 */
class RouteTest extends TestCase
{
    /** @var $route Route */
    private $route;

    public function validRouteDataProvider()
    {
        return
            [
                [1, new SpecialColor(EnumColors::SPECIAL), 2, [new City(EnumCity::VANCOUVER), new City(EnumCity::CALGARY)]],
                [2, new SpecialColor(EnumColors::SPECIAL), 2, [new City(EnumCity::BOSTON), new City(EnumCity::MONTREAL)]],
                [3, new GenericColor(EnumColors::RED), 4, [new City(EnumCity::DALLAS), new City(EnumCity::ELPASO)]],
                [4, new GenericColor(EnumColors::BLACK), 4, [new City(EnumCity::DENVER), new City(EnumCity::KANSASCITY)]],
                [5, new GenericColor(EnumColors::GREEN), 6, [new City(EnumCity::HOUSTON), new City(EnumCity::ELPASO)]],
                [6, new GenericColor(EnumColors::ORANGE), 3, [new City(EnumCity::LASVEGAS), new City(EnumCity::SALTLAKE)]],
                [7, new GenericColor(EnumColors::WHITE), 3, [new City(EnumCity::LITTLEROCK), new City(EnumCity::NASHVILLE)]],
                [8, new GenericColor(EnumColors::BLUE), 5, [new City(EnumCity::MIAMI), new City(EnumCity::ATLANTA)]],
                [9, new GenericColor(EnumColors::PURPLE), 4, [new City(EnumCity::MIAMI), new City(EnumCity::CHARLSTON)]],
                [10, new GenericColor(EnumColors::BLUE), 3, [new City(EnumCity::OKLAHOMACITY), new City(EnumCity::SANTAFE)]],
                [11, new GenericColor(EnumColors::GREEN), 5, [new City(EnumCity::PITTSBURG), new City(EnumCity::SAINTLOUIS)]],
                [12, new SpecialColor(EnumColors::SPECIAL), 1, [new City(EnumCity::OMAHA), new City(EnumCity::KANSASCITY)]],
                [13, new GenericColor(EnumColors::YELLOW), 4, [new City(EnumCity::NEWORLEANS), new City(EnumCity::ATLANTA)]],
                [14, new GenericColor(EnumColors::BLACK), 5, [new City(EnumCity::MONTREAL), new City(EnumCity::SAULTSTMARIE)]]
            ];
    }

    /**
     * @param $id
     * @param $color
     * @param $nSegments
     * @param $cities
     * @dataProvider validRouteDataProvider
     */
    public function testValidRoute ($id, $color, $nSegments, $cities)
    {
        $this->route = new Route(
            $id,
            $color,
            $nSegments,
            $cities
        );

        $this->assertEquals($id, $this->route->getId());
        $this->assertInstanceOf(AbstractColor::class, $this->route->getColor());
        $this->assertEquals($color, $this->route->getColor());
        $this->assertEquals($nSegments, $this->route->getNSegments());
        $this->assertEquals($cities, $this->route->getCities());

        foreach($this->route->getCities() as $city)
        {
            $this->assertInstanceOf(City::class, $city);
        }
    }

    public function invalidRouteDataProvider()
    {
        return
            [
                [1, new SpecialColor(EnumColors::SPECIAL), 0, [new City(EnumCity::VANCOUVER), new City(EnumCity::CALGARY)]],
                [2, new SpecialColor(EnumColors::SPECIAL), 2, [new City(EnumCity::BOSTON), new City(EnumCity::BOSTON)]],
                [3, new GenericColor(EnumColors::RED), 50, [new City(EnumCity::DALLAS), new City(EnumCity::ELPASO)]],
                [0, new GenericColor(EnumColors::RED), 5, [new City(EnumCity::MONTREAL), new City(EnumCity::SAULTSTMARIE)]],
                [4, new GenericColor(EnumColors::RED), 5, [new City(EnumCity::MONTREAL), new City(EnumCity::SAULTSTMARIE), new City(EnumCity::KANSASCITY)]],
                [5, new GenericColor(EnumColors::RED), 5, ['invalid city 1', 'invalid city 2']]
            ];
    }

    /**
     * @param $id
     * @param $color
     * @param $nSegments
     * @param $cities
     * @dataProvider invalidRouteDataProvider
     */
    public function testInvalidRoute ($id, $color, $nSegments, $cities)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->route = new Route(
            $id,
            $color,
            $nSegments,
            $cities
        );
    }

}
