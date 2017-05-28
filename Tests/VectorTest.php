<?php

class VectorTest extends \PHPUnit\Framework\TestCase
{
    public function testCreatingVectorFromHeadingID()
    {
        $vec = \Robots\Application\Math\Vector::fromHeading(
            \Robots\Application\Base\Heading::WEST
        );

        $this->assertEquals(-1, $vec->x);
        $this->assertEquals(0, $vec->y);
    }

    public function testVectorAddition()
    {
        $a = new \Robots\Application\Math\Vector(5, 2);
        $b = new \Robots\Application\Math\Vector(7, 6);

        $vec = \Robots\Application\Math\Vector::add($a, $b);

        $this->assertEquals(12, $vec->x);
        $this->assertEquals(8, $vec->y);
    }


    public function testVectorSubtraction()
    {
        $a = new \Robots\Application\Math\Vector(9, 5);
        $b = new \Robots\Application\Math\Vector(3, 8);

        $vec = \Robots\Application\Math\Vector::subtract($a, $b);

        $this->assertEquals(6, $vec->x);
        $this->assertEquals(-3, $vec->y);
    }

    public function testVectorRotation()
    {
        $a = new \Robots\Application\Math\Vector(0, 1);

        $vec = \Robots\Application\Math\Vector::rotate($a, 90);

        $this->assertEquals(1, $vec->x);
        $this->assertEquals(0, $vec->y);
    }
}