# Singleton Pattern
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/byjg/SingletonPatternPHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/byjg/SingletonPatternPHP/?branch=master)
[![Code Climate](https://codeclimate.com/github/byjg/SingletonPatternPHP/badges/gpa.svg)](https://codeclimate.com/github/byjg/SingletonPatternPHP)

## Description

A lightweight PHP implementation of the Design Pattern Singleton using trait.
Just one class and no dependencies. 

## Usage

### Create your class

```php
require "vendor/autoload.php";

class Example
{
    // You need to use the trait here
    use \ByJG\DesignPattern\Singleton;

    // Put your code below
}
```

**REMEMBER:** Your class cannot have a public constructor. If it is necessary, use a private or protected constructor instead. 
Singleton classes does not have arguments in the constructor;


### Use your class

```php
$example = Example::getInstance();
```

## Install

Just type: `composer require "byjg/singleton-pattern=~1.0"`

## References

* https://en.wikipedia.org/wiki/Singleton_pattern

