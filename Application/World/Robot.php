<?php
namespace Robots\Application\World;

use Robots\Application\Base\Heading;
use Robots\Application\Base\Positionable;
use Robots\Application\Math\Vector;

class Robot extends Positionable
{
    private $placed = false;
    private $board = null;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function place(int $x, int $y, string $heading)
    {
        if ($this->board->positionInBounds($x, $y))
        {
            $this->placed = true;
            $this->position = new Vector($x, $y);
            $this->direction = Vector::fromHeading(Heading::fromString($heading));

            return true;
        }

        // something went wrong -- position out of board bounds
        return false;
    }

    public function moveForwards()
    {
        if ($this->placed)
        {
            $newPosition = Vector::add($this->position, $this->direction);
            if ($this->board->positionInBounds($newPosition->x, $newPosition->y))
            {
                $this->position = $newPosition;
            }
        }
    }

    public function rotateLeft()
    {
        if ($this->placed)
        {
            $this->direction = Vector::rotate($this->direction, 90);
        }
    }

    public function rotateRight()
    {
        if ($this->placed)
        {
            $this->direction = Vector::rotate($this->direction, -90);
        }
    }

    public function report()
    {
        if ($this->placed)
        {
            printf(
                "X: %d\nY: %d\nF: %s\n",
                $this->position->x,
                $this->position->y,
                Heading::convertHeadingToString(Heading::fromVector($this->direction))
            );
        }
    }
}