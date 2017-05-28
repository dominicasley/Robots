<?php
namespace Robots\Application\Input\Commands;

use Robots\Application\Base\FunctionDelegate;
use Robots\Application\Input\Command;
use Robots\Application\World\Robot;

class Report extends Command
{
    public function __construct()
    {
        parent::__construct(
            "REPORT",
            "/^((?i)REPORT)\s*/i",
            new FunctionDelegate(Robot::class, 'report')
        );
    }
}