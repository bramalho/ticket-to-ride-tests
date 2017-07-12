<?php

/**
 * Created by PhpStorm.
 * User: ritacatarino
 * Date: 12/07/2017
 * Time: 17:21
 */
class ScoreRoute
{
    private $score;

    public function __construct(Route $route)
    {
        switch ($route->getNSegments()) {
            case 1:
            case 2:
                $this->score = $route->getNSegments();
            case 3:
                $this->score =  4;
            case 4:
                $this->score =  7;
            case 5:
                $this->score =  10;
            case 6:
                $this->score =  15;
        }
    }

    public function getScore()
    {
        return $this->score;
    }

}