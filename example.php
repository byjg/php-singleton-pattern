<?php

require "vendor/autoload.php";

class Example
{
    use \ByJG\DesignPattern\Singleton;

    protected $_uniqId;

    protected function __construct()
    {
        $this->_uniqId = rand(0, 1000);
    }

    public function getId()
    {
        return $this->_uniqId;
    }

}


// This works;
// Must return the same ID;
$example1 = Example::getInstance();
echo $example1->getId() . "\n";

$example2 = Example::getInstance();
echo $example2->getId() . "\n";


// That cannot work!
$example3 = new Example();
