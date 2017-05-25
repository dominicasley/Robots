<?php
namespace Robots\Application\World;

use Robots\Application\Base\Positionable;
use Robots\Application\Exceptions\InvalidBoardSizeException;

class Board
{
    const DEFAULT_BOARD_WIDTH = 5;
    const DEFAULT_BOARD_HEIGHT = 5;

    private $width;
    private $height;
    private $objects;

    function __construct(int $width = self::DEFAULT_BOARD_WIDTH, int $height = self::DEFAULT_BOARD_HEIGHT)
    {
        if ($width < 1 || $height < 1)
        {
            throw new InvalidBoardSizeException();
        }

        $this->width = $width;
        $this->height = $height;
        $this->objects = array();
    }

    public function addObject(Positionable $object, int $x, int $y)
    {
        if ($this->positionInBounds($x, $y))
        {
            $this->objects[] = $object;

            return true;
        }

        return false;
    }

    private function positionInBounds(int $x, int $y)
    {
        return ($x > 0 && $y > 0 && $x < $this->width && $y < $this->height);
    }
}