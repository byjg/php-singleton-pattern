<?php

namespace ByJG\DesignPattern;

trait Singleton
{
    protected function __construct()
    {
    }

    /**
     * @throws SingletonException
     */
    final private function __clone()
    {
        throw new SingletonException('You can not clone a singleton.');
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        static $instances;

        $calledClass = get_called_class();

        if (!isset($instances[$calledClass])) {
            $instances[$calledClass] = new $calledClass();
        }
        return $instances[$calledClass];
    }

}
