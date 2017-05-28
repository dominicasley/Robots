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

    function __construct(int $width = self::DEFAULT_BOARD_WIDTH, int $height = self::DEFAULT_BOARD_HEIGHT)
    {
        if ($width < 1 || $height < 1)
        {
            throw new InvalidBoardSizeException();
        }

        $this->width = $width;
        $this->height = $height;
    }

    public function positionInBounds(int $x, int $y)
    {
        return ($x >= 0 && $y >= 0 && $x <= $this->width && $y <= $this->height);
    }
}