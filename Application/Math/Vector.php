<?php
namespace Robots\Application\Math;

use Robots\Application\Base\Heading;

class Vector
{
    public $x;
    public $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    static public function fromHeading(int $heading)
    {
        $x = 0;
        $y = 0;

        switch ($heading)
        {
            case Heading::NORTH:
                $x = 0;
                $y = 1;
                break;
            case Heading::EAST:
                $x = 1;
                $y = 0;
                break;
            case Heading::SOUTH:
                $x = 0;
                $y = -1;
                break;
            case Heading::WEST:
                $x = -1;
                $y = 0;
                break;
            default:
                break;
        }

        return new Vector($x, $y);
    }

    public static function add(Vector $a, Vector $b)
    {
        $x = $a->x + $b->x;
        $y = $a->y + $b->y;

        return new Vector($x, $y);
    }

    public static function subtract(Vector $a, Vector $b)
    {
        $x = $a->x - $b->x;
        $y = $a->y - $b->y;

        return new Vector($x, $y);
    }

    public static function rotate(Vector $vec, float $angle)
    {
        $rad = deg2rad(-$angle);
        $x = $vec->x * cos($rad) - $vec->y * sin($rad);
        $y = $vec->x * sin($rad) + $vec->y * cos($rad);

        return new Vector($x, $y);
    }
}