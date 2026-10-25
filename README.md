---
sidebar_key: singleton-pattern
sidebar_category: infrastructure
tags: [php]
---

# Singleton Pattern

The singleton pattern as one trait: add it to a class, and that class has exactly one instance.

[![Sponsor](https://img.shields.io/badge/Sponsor-%23ea4aaa?logo=githubsponsors&logoColor=white&labelColor=0d1117)](https://github.com/sponsors/byjg)
[![Build Status](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml/badge.svg?branch=master)](https://github.com/byjg/php-singleton-pattern/actions/workflows/phpunit.yml)
[![Opensource ByJG](https://img.shields.io/badge/opensource-byjg-success.svg)](https://opensource.byjg.com)
[![Install MCP Server](https://img.shields.io/badge/Install-MCP_Server-8A2BE2?logo=modelcontextprotocol&logoColor=white)](https://opensource.byjg.com/docs/ai/mcpserver-byjg-docs/)
[![GitHub source](https://img.shields.io/badge/Github-source-informational?logo=github)](https://github.com/byjg/php-singleton-pattern/)
[![GitHub license](https://img.shields.io/github/license/byjg/php-singleton-pattern.svg)](https://opensource.byjg.com/license/)
[![GitHub release](https://img.shields.io/github/release/byjg/php-singleton-pattern.svg)](https://github.com/byjg/php-singleton-pattern/releases/)

## Why

A singleton is a few lines that every project writes again, and usually incompletely: the
constructor is private, but the instance can still be duplicated with `clone` or with
`unserialize()`.

Add the trait and the class gets `getInstance()`, one instance per class (subclasses get
their own), and blocks cloning, serializing and unserializing. One trait, no dependencies.

## Documentation

- [Getting Started](docs/getting-started.md) - Installation and requirements
- [Creating a Singleton Class](docs/creating-singleton.md) - How to implement the pattern
- [Using Your Singleton](docs/using-singleton.md) - Working with singleton instances
- [How It Works](docs/how-it-works.md) - Implementation details
- [API Reference](docs/api-reference.md) - Complete API documentation

## Requirements

PHP 8.3 or higher

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
- Uses a static local variable within `getInstance()` to store instances of each class that uses the trait

## Running Tests

```bash
vendor/bin/phpunit
```

## References

* [Wikipedia: Singleton Pattern](https://en.wikipedia.org/wiki/Singleton_pattern)
* [Documentation](docs/getting-started.md)

----
[Open source ByJG](https://opensource.byjg.com)