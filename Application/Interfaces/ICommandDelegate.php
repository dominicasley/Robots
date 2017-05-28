<?php
namespace Robots\Application\Interfaces;

interface ICommandDelegate
{
    public function executeBuffer(array $commandBuffer);
}