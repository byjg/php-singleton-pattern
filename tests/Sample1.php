<?php

require_once __DIR__ . "/../vendor/autoload.php";

class Sample1
{
    use \ByJG\DesignPattern\Singleton;

    public $property;

    private function __construct()
    {
        $this->property = 10;
    }
}
