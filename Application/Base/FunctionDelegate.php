<?php
namespace Robots\Application\Base;

class FunctionDelegate
{
    private $type;
    private $functionName;

    public function __construct($type, $functionName)
    {
        $this->type = $type;
        $this->functionName = $functionName;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getFunctionName()
    {
        return $this->functionName;
    }
}