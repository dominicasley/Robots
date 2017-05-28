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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getFunctionName()
    {
        return $this->functionName;
    }
}