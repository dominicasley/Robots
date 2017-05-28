<?php
namespace Robots\Application\Input;

use Robots\Application\Interfaces\ICommandDelegate;
use Robots\Application\World\Board;
use Robots\Application\World\Robot;

class RobotCommandDelegate implements ICommandDelegate
{
    private $robot;

    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
    }

    public function executeBuffer(array $commandBuffer)
    {
        foreach ($commandBuffer as $command)
        {
            $command->execute($this->robot);
        }
    }
}