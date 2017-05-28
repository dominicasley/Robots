<?php

class BoardTest extends \PHPUnit\Framework\TestCase
{
    public function testCreatingBoardWithValidValues()
    {
        $board = new \Robots\Application\World\Board(10, 10);
        $this->assertEquals(10, $board->getWidth());
        $this->assertEquals(10, $board->getHeight());
    }

    public function testCreatingBoardWithInvalidValues()
    {
        $this->expectException(
            \Robots\Application\Exceptions\InvalidBoardSizeException::class
        );

        new \Robots\Application\World\Board(-10, 10);
    }

    public function testPositionInBounds()
    {
        $board = new \Robots\Application\World\Board(10, 10);

        $this->assertEquals(true, $board->positionInBounds(5, 5));
        $this->assertEquals(false, $board->positionInBounds(15, 5));
        $this->assertEquals(false, $board->positionInBounds(5, 15));
        $this->assertEquals(false, $board->positionInBounds(-1, 5));
    }
}