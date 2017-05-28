<?php
namespace Robots\Application;

use Robots\Application\Input\RobotCommandDelegate;
use Robots\Application\Input\CommandReader;
use Robots\Application\World\Board;
use Robots\Application\World\Robot;

class RobotApp
{
    private function getInputFromFile($argv)
    {
        $search = "-file=";
        foreach ($argv as $argument)
        {
            if (substr( $argument, 0, strlen($search) ) === $search)
            {
                $fileName = substr( $argument, strlen($search),  strlen($argument));

                if (file_exists($fileName))
                {
                    return file_get_contents ($fileName);
                }
                else
                {
                    printf("ERROR: Cannot open file $fileName.\n\n");
                }
            }
        }

        return false;
    }

    public function run(array $argv)
    {
        $reader = new CommandReader();
        $delegate = new RobotCommandDelegate(new Robot(new Board(5, 5), true));

        $stdInFileHandle = fopen( 'php://stdin', 'r' );

        $inputFromFile = $this->getInputFromFile($argv);
        if ($inputFromFile != false)
        {
            if ($reader->parseLine($inputFromFile))
            {
                $delegate->executeBuffer($reader->getCommandBuffer());
                $reader->flushCommandBuffer();
            }
        }

        print "command: ";
        while($input = fgets($stdInFileHandle))
        {
            if ($reader->parseLine($input))
            {
                $delegate->executeBuffer($reader->getCommandBuffer());
                $reader->flushCommandBuffer();
            }

            print "command: ";
        }
    }
}