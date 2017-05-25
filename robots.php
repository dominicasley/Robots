<?php
/**
 * Created by PhpStorm.
 * User: dominic
 * Date: 25/05/17
 * Time: 10:13 PM
 */

require __DIR__ . '/Bootstrap/Autoload.php';

$app = new \Robots\Application\RobotApp();
$app->run();