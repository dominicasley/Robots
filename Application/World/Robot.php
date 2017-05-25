<?php
namespace Robots\Application\World;

use Robots\Application\Base\Heading;
use Robots\Application\Base\Positionable;

class Robot extends Positionable
{
    private $board = null;

    function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function place(int $x, int $y, Heading $heading)
    {
        if ($this->board->addObject($this, $x, $y))
        {
            $this->x = $x;
            $this->y = $y;
            $this->heading = $heading;

            return true;
        }

        // something went wrong
        return false;
    }

    public function move()
    {

    }

    public function rotateLeft()
    {

    }

    public function rotateRight()
    {

    }
}