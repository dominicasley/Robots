<?php
namespace Robots\Application;

use Robots\Application\World\Board;
use Robots\Application\World\Robot;

class RobotApp
{
    public function run()
    {
        $board = new Board(100, 200);
        $robot = new Robot($board);

        printf("MEmes\n");
    }
}