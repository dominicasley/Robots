<?php
namespace Robots\Application\World;

use Robots\Application\Base\Heading;
use Robots\Application\Base\Positionable;
use Robots\Application\Math\Vector;

class Robot extends Positionable
{
    private $placed = false;
    private $board = null;
    private $printMessages = false;

    public function __construct(Board $board, bool $printMessages = false)
    {
        $this->board = $board;
        $this->printMessages = $printMessages;
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
        else
        {
            if ($this->printMessages)
            {
                printf(
                    "ERROR: Placing robot outside of board bounds is not allowed.\n" .
                    "Valid positions are between 0 - %d and 0 - %d\n\n",
                    $this->board->getWidth(),
                    $this->board->getHeight()
                );
            }
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
            else
            {
                if ($this->printMessages)
                {
                    printf("ERROR: Cannot move robot out of board bounds\n\n");
                }
            }
        }
    }

    public function rotateLeft()
    {
        if ($this->placed)
        {
            $this->direction = Vector::rotate($this->direction, -90);
        }
    }

    public function rotateRight()
    {
        if ($this->placed)
        {
            $this->direction = Vector::rotate($this->direction, 90);
        }
    }

    public function report()
    {
        if ($this->placed)
        {
            printf(
                "X: %d\nY: %d\nF: %s\n\n",
                $this->position->x,
                $this->position->y,
                Heading::convertHeadingToString(Heading::fromVector($this->direction))
            );
        }
    }

    public function getPositionX()
    {
        return $this->position->x;
    }

    public function getPositionY()
    {
        return $this->position->y;
    }

    public function getDirectionX()
    {
        return $this->direction->x;
    }

    public function getDirectionY()
    {
        return $this->direction->y;
    }
}