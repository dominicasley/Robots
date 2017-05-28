<?php
namespace Robots\Application\Input\Commands;

use Robots\Application\Base\FunctionDelegate;
use Robots\Application\Input\Command;
use Robots\Application\World\Robot;

class Right extends Command
{
    public function __construct()
    {
        parent::__construct(
            "RIGHT",
            "/^((?i)RIGHT)\s*/i",
            new FunctionDelegate(Robot::class, 'rotateRight')
        );
    }
}