<?php

namespace Tests;

use ByJG\DesignPattern\Singleton;

class Sample1
{
    use Singleton;

    public int $property;

    private function __construct()
    {
        $this->property = 10;
    }
}
