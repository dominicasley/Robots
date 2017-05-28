<?php
namespace Robots\Application;

use Robots\Application\Input\RobotCommandDelegate;
use Robots\Application\Input\CommandReader;
use Robots\Application\World\Board;
use Robots\Application\World\Robot;

class RobotApp
{
    public function run()
    {
        $reader = new CommandReader();
        $delegate = new RobotCommandDelegate(new Robot(new Board(5, 5)));

        $stdInFileHandle = fopen( 'php://stdin', 'r' );

        while($input = fgets($stdInFileHandle))
        {
            if ($reader->parseLine($input))
            {
                $delegate->executeBuffer($reader->getCommandBuffer());
            }
        }
    }
}