<?php
namespace Robots\Application\Input;

class CommandReader
{
    const COMMAND_DIRECTORY = "/Commands";
    const COMMAND_NAMESPACE = "Robots\Application\Input\Commands";
    const REGEX_ARGUMENT_OFFSET = 2;

    private $commandBuffer = array();
    private $commandDefinitions = array();

    public function __construct()
    {
        $this->getAvailableCommands(__DIR__ . self::COMMAND_DIRECTORY, self::COMMAND_NAMESPACE);
    }

    private function getAvailableCommands($directory, $namespace)
    {
        $files = scandir($directory);

        $classes = array_map(function($file) use ($namespace){
            return $namespace . '\\' . str_replace('.php', '', $file);
        }, $files);

        $availableCommands = array_filter($classes, function($possibleClass){
            return class_exists($possibleClass);
        });

        foreach ($availableCommands as $command)
        {
            $commandInstance = new $command();
            if ($commandInstance instanceof Command)
            {
                $this->commandDefinitions[] = $commandInstance;
            }
        }
    }

    public function parseLine(string $line)
    {
        $line = trim($line);

        if (strlen($line) > 1)
        {
            $matchFound = false;
            foreach ($this->commandDefinitions as $command)
            {
                preg_match($command->getRegex(), $line, $matches);

                if (count($matches) > 1)
                {
                    $matchFound = true;
                    $commandInstance = clone($command);

                    for ($i = self::REGEX_ARGUMENT_OFFSET; $i < count($matches); $i++)
                    {
                        $commandInstance->setArg($i-self::REGEX_ARGUMENT_OFFSET, $matches[$i]);
                    }

                    $this->commandBuffer[] = $commandInstance;

                    $offset = strlen($matches[0]);
                    $line = substr($line, $offset, strlen($line) - $offset);

                    break;
                }
            }

            if ($matchFound)
            {
                $this->parseLine($line);
            }
            else
            {
                printf("PARSE ERROR: Unknown command at $line\n\n");

                return false;
            }
        }

        return true;
    }

    public function getCommandBuffer()
    {
        return $this->commandBuffer;
    }

    public function flushCommandBuffer()
    {
        $this->commandBuffer = array();
    }
}