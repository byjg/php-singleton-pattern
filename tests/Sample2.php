<?php

namespace Tests;

use ByJG\DesignPattern\Singleton;

class Sample2
{
    use Singleton;

    public int $property2;
    
    private function __construct()
    {
        $this->property2 = 20;
    }
}
