<?php
namespace Robots\Application\Base;

use Robots\Application\Math\Vector;

abstract class Heading
{
    const NORTH = 0;
    const EAST = 1;
    const SOUTH = 2;
    const WEST = 3;

    public static function fromVector(Vector $vector)
    {
        if ($vector->x == 0 && $vector->y == 1)
        {
            return Heading::NORTH;
        }
        else if ($vector->x == 1 && $vector->y == 0)
        {
            return Heading::EAST;
        }
        else if ($vector->x == 0 && $vector->y == -1)
        {
            return Heading::SOUTH;
        }
        else if ($vector->x == -1 && $vector->y == 0)
        {
            return Heading::WEST;
        }

        return -1;
    }

    public static function fromString(string $heading)
    {
        $heading = strtoupper($heading);
        switch ($heading)
        {
            case "NORTH":
                return Heading::NORTH;
            case "EAST":
                return Heading::EAST;
            case "SOUTH":
                return Heading::SOUTH;
            case "WEST":
                return Heading::WEST;
            default:
                return "";
        }
    }

    public static function convertHeadingToString(int $heading)
    {
        switch ($heading)
        {
            case Heading::NORTH:
                return "NORTH";
            case Heading::EAST:
                return "EAST";
            case Heading::SOUTH:
                return "SOUTH";
            case Heading::WEST:
                return "WEST";
            default:
                return "";
        }
    }
}