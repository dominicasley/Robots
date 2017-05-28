<?php
namespace Robots\Application\Input;

use Robots\Application\Base\FunctionDelegate;

class Command
{
    protected $name;
    protected $regex;
    protected $args = array();
    protected $functionDelegate = null;

    public function __construct(string $name, string $regex, FunctionDelegate $delegate, array $args = array())
    {
        $this->name = $name;
        $this->regex = $regex;
        $this->args = $args;
        $this->functionDelegate = $delegate;
    }

    public function getRegex()
    {
        return $this->regex;
    }

    public function setArg(int $argumentIndex, $value)
    {
        try
        {
            $keys = array_keys($this->args);
            $this->args[$keys[$argumentIndex]] = $value;
        }
        catch (\OutOfBoundsException $e)
        {
            printf("PARSE ERROR: Argument capture / definition mismatch for command $this->name\n");
        }
    }

    public function execute($instance)
    {
        if ($this->functionDelegate != null && is_a($instance, $this->functionDelegate->getType()))
        {
            call_user_func_array(array($instance, $this->functionDelegate->getFunctionName()), array_values($this->args));
        }
    }

    public function __toString()
    {
        $outputString = "$this->name\n";

        if (count($this->args) > 0)
        {
            foreach ($this->args as $arg => $value)
            {
                $outputString .= "\t$arg: $value\n";
            }
        }

        return $outputString;
    }
}