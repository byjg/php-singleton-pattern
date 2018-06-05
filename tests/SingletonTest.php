<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once "Sample1.php";
require_once "Sample2.php";

class SingletonTest extends \PHPUnit\Framework\TestCase
{
    public function testSingleton()
    {
        $sample1 = Sample1::getInstance();
        $this->assertEquals(10, $sample1->property);
        $sample1->property = 20;
        $this->assertEquals(20, $sample1->property);

        $sample1Other = Sample1::getInstance();
        $this->assertEquals(20, $sample1Other->property);
        $sample1->property = 40;
        $this->assertEquals(40, $sample1Other->property);
        $this->assertEquals(40, $sample1->property);

        //

        $sample2 = Sample2::getInstance();
        $sample2->property2 = 50;
        $this->assertEquals(50, $sample2->property2);

        $sample2Other = Sample2::getInstance();
        $this->assertEquals(50, $sample2Other->property2);
        $sample2->property2 = 90;
        $this->assertEquals(90, $sample2Other->property2);
        $this->assertEquals(90, $sample2->property2);

        //

        $this->assertEquals(40, $sample1->property);
    }

    /**
     * @expectedException \ByJG\DesignPattern\SingletonException
     */
    public function testClone()
    {
        $sample1 = Sample1::getInstance();
        $sample2 = clone $sample1;
    }

    /**
     * @expectedException \ByJG\DesignPattern\SingletonException
     */
    public function testSerialize()
    {
        $sample1 = Sample1::getInstance();
        $serialize = serialize($sample1);
    }
}
