[![Build Status](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml)
[![Opensource ByJG](https://img.shields.io/badge/opensource-byjg-success.svg)](http://opensource.byjg.com)
[![GitHub source](https://img.shields.io/badge/Github-source-informational?logo=github)](https://github.com/byjg/php-singleton-pattern/)
[![GitHub license](https://img.shields.io/github/license/byjg/php-singleton-pattern.svg)](https://opensource.byjg.com/opensource/licensing.html)
[![GitHub release](https://img.shields.io/github/release/byjg/php-singleton-pattern.svg)](https://github.com/byjg/php-singleton-pattern/releases/)

# Singleton Pattern

A lightweight PHP implementation of the Design Pattern Singleton using trait.
Just one class and no dependencies. 

## Requirements

PHP 8.1 or higher

## Installation

```
composer require "byjg/singleton-pattern"
```

## Creating a Singleton Class

```php
<?php
require "vendor/autoload.php";

class Example
{
    // Use the Singleton trait to implement the pattern
    use \ByJG\DesignPattern\Singleton;
    
    // You can add properties to your singleton
    public string $someProperty;
    
    // The constructor MUST be private or protected
    private function __construct()
    {
        // Optional initialization code
        $this->someProperty = "Initial value";
    }
    
    // Add your own methods and properties here
    public function doSomething(): void
    {
        // Your code here
    }
}
```

**IMPORTANT:**
1. Your class MUST use a private or protected constructor.
2. Singleton classes do not accept arguments in the constructor.
3. Attempting to clone, serialize, or unserialize a singleton will throw a `SingletonException`.

## Using your Singleton class

```php
// Get the singleton instance
$example = Example::getInstance();

// The same instance is always returned
$anotherReference = Example::getInstance();
$example->someProperty = "Changed value";

// This will output "Changed value" because both variables reference the same instance
echo $anotherReference->someProperty;

// This will throw a SingletonException
try {
    $cloned = clone $example;
} catch (\ByJG\DesignPattern\SingletonException $e) {
    echo "Cannot clone a singleton!";
}
```

## How It Works

The `Singleton` trait:
- Implements the `getInstance()` static method to create and manage a single instance
- Prevents cloning by overriding the `__clone()` method
- Prevents serialization and deserialization by overriding `__sleep()` and `__wakeup()`
- Uses a static property to store instances of each class that uses the trait

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