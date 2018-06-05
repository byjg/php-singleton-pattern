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
    final public function __clone()
    {
        throw new SingletonException('You can not clone a singleton.');
    }

    /**
     * @throws SingletonException
     */
    final public function __sleep()
    {
        throw new SingletonException('You can not serialize a singleton.');
    }

    /**
     * @throws SingletonException
     */
    final public function __wakeup()
    {
        throw new SingletonException('You can not deserialize a singleton.');
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
