<?php

/**
 * Created by PhpStorm.
 * User: dominic
 * Date: 25/05/17
 * Time: 10:19 PM
 */

namespace Robots\Application\World;

class Board
{
    const DEFAULT_BOARD_WIDTH = 5;
    const DEFAULT_BOARD_HEIGHT = 5;

    private $width;
    private $height;

    function __construct($width = self::DEFAULT_BOARD_WIDTH, $height = self::DEFAULT_BOARD_HEIGHT)
    {

        $this->width = $width;
        $this->height = $height;
    }
}