# Singleton Pattern

[![Build Status](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml) 
[![Opensource ByJG](https://img.shields.io/badge/opensource-byjg-success.svg)](http://opensource.byjg.com) 
[![GitHub source](https://img.shields.io/badge/Github-source-informational?logo=github)](https://github.com/byjg/php-singleton-pattern/) 
[![GitHub license](https://img.shields.io/github/license/byjg/php-singleton-pattern.svg)](https://opensource.byjg.com/opensource/licensing.html) 
[![GitHub release](https://img.shields.io/github/release/byjg/php-singleton-pattern.svg)](https://github.com/byjg/php-singleton-pattern/releases/)


A lightweight PHP implementation of the Design Pattern Singleton using trait.
Just one class and no dependencies. 

## Create your class

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

## Use your class

```php
$example = Example::getInstance();
```

## Install

```
composer require "byjg/singleton-pattern"
```

## Run Tests

```
vendor/bin/phpunit
```

## References

* https://en.wikipedia.org/wiki/Singleton_pattern

## Dependencies

```mermaid
flowchart TD
    byjg/singleton-pattern
```

----
[Open source ByJG](http://opensource.byjg.com)
