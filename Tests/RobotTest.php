<?php

class RobotTest extends \PHPUnit\Framework\TestCase
{
    public function testPlacingRobotOnBoard()
    {
        $board = new \Robots\Application\World\Board(5, 5);
        $robot = new \Robots\Application\World\Robot($board);

        $this->assertEquals(false, $robot->place(-1, 0, "NORTH"));
        $this->assertEquals(false, $robot->place(10, 0, "NORTH"));
        $this->assertEquals(true, $robot->place(0, 0, "NORTH"));
        $this->assertEquals(true, $robot->place(4, 4, "NORTH"));
    }

    public function testMove()
    {
        $board = new \Robots\Application\World\Board(5, 5);
        $robot = new \Robots\Application\World\Robot($board);

        $robot->place(0, 1, "EAST");

        $this->assertEquals(0, $robot->getPositionX());
        $this->assertEquals(1, $robot->getPositionY());
        $this->assertEquals(1, $robot->getDirectionX());
        $this->assertEquals(0, $robot->getDirectionY());

        $robot->moveForwards();
        $robot->moveForwards();

        $this->assertEquals(2, $robot->getPositionX());
        $this->assertEquals(1, $robot->getPositionY());
        $this->assertEquals(1, $robot->getDirectionX());
        $this->assertEquals(0, $robot->getDirectionY());
    }

    public function testRobotWontGoOffBoard()
    {
        $board = new \Robots\Application\World\Board(5, 5);
        $robot = new \Robots\Application\World\Robot($board);

        $robot->place(0, 0, "WEST");
        $robot->moveForwards();
        $robot->moveForwards();


        $this->assertEquals(0, $robot->getPositionX());
        $this->assertEquals(0, $robot->getPositionY());
    }
}