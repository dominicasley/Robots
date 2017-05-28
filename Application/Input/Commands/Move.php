<?php
namespace Robots\Application\Input\Commands;

use Robots\Application\Base\FunctionDelegate;
use Robots\Application\Input\Command;
use Robots\Application\World\Robot;

class Move extends Command
{
    public function __construct()
    {
        parent::__construct(
            "MOVE",
            "/^((?i)MOVE)\s*/i",
            new FunctionDelegate(Robot::class, 'moveForwards')
        );
    }
}