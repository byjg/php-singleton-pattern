<?php

namespace ByJG\DesignPattern;

use Exception;

trait Singleton
{
	protected function __construct()
	{ }

	final private function __clone()
	{
		throw new Exception('You can not clone a singleton.');
	}

	public static function getInstance()
	{
    	static $instances;

        $calledClass = get_called_class();

		if (!isset($instances[$calledClass]))
		{
            $instances[$calledClass] = new $calledClass();
		}
		return $instances[$calledClass];
	}

}
