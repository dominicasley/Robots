<?php
namespace Robots\Application\Input\Commands;

use Robots\Application\Base\FunctionDelegate;
use Robots\Application\Input\Command;
use Robots\Application\World\Robot;

class Left extends Command
{
    public function __construct()
    {
        parent::__construct(
            "LEFT",
            "/^((?i)LEFT)\s*/i",
            new FunctionDelegate(Robot::class, 'rotateLeft')
        );
    }
}