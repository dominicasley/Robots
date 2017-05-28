<?php


class HeadingTest extends \PHPUnit\Framework\TestCase
{
    public function testGettingConstHeadingIDFromVector()
    {
        $vec = new \Robots\Application\Math\Vector(0, 1); // north

        $this->assertEquals(
            \Robots\Application\Base\Heading::NORTH,
            \Robots\Application\Base\Heading::fromVector($vec)
        );
    }

    public function testGettingConstHeadingIDFromString()
    {
        $string = "EaSt"; // north

        $this->assertEquals(
            \Robots\Application\Base\Heading::EAST,
            \Robots\Application\Base\Heading::fromString($string)
        );
    }

    public function testToString()
    {
       $this->assertEquals(
           "SOUTH",
           \Robots\Application\Base\Heading::convertHeadingToString(
               \Robots\Application\Base\Heading::SOUTH
           )
       );
    }
}