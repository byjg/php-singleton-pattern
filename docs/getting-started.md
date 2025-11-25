---
sidebar_position: 1
---

# Getting Started

## Requirements

PHP 8.3 or higher

## Installation

Install the package via Composer:

```bash
composer require "byjg/singleton-pattern"
```

This package has no external dependencies - just one trait and one exception class.

## What is the Singleton Pattern?

The Singleton pattern is a design pattern that restricts the instantiation of a class to a single instance. This is useful when exactly one object is needed to coordinate actions across the system.

## Quick Example

```php
<?php
require "vendor/autoload.php";

class MyConfig
{
    use \ByJG\DesignPattern\Singleton;

    private function __construct()
    {
        // Load configuration
    }
}

// Get the single instance
$config = MyConfig::getInstance();
```

## Next Steps

- [Creating a Singleton Class](creating-singleton.md)
- [Using Your Singleton](using-singleton.md)
- [How It Works](how-it-works.md)
