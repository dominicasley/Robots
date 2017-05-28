<?php
namespace Robots\Application\Input\Commands;

use Robots\Application\Base\FunctionDelegate;
use Robots\Application\Input\Command;
use Robots\Application\World\Robot;

class Place extends Command
{
    public function __construct()
    {
        parent::__construct(
            "PLACE",
            "/^((?i)PLACE)\s+(\d+)\s*,\s*(\d+)\s*,\s*((?i)NORTH|(?i)SOUTH|(?i)EAST|(?i)WEST)/i",
            new FunctionDelegate(Robot::class, 'place'),
            array("x" => 0, "y" => 0, "heading" => "")
        );
    }
}