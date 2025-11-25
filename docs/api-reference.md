---
sidebar_position: 5
---

# API Reference

## Singleton Trait

**Namespace:** `ByJG\DesignPattern`

The `Singleton` trait provides a complete implementation of the Singleton design pattern.

### Methods

#### getInstance()

```php
public static function getInstance(): static
```

Returns the singleton instance of the class. Creates the instance on first call.

**Returns:** The singleton instance of the calling class

**Example:**
```php
$instance = MyClass::getInstance();
```

#### __construct()

```php
protected function __construct()
```

Protected constructor to prevent direct instantiation. Override this in your class with a private or protected constructor.

**Note:** Should be overridden as `private` or `protected` in implementing classes.

#### __clone()

```php
public function __clone()
```

Prevents cloning of the singleton instance.

**Throws:** `ByJG\DesignPattern\SingletonException` - Always throws when clone is attempted

**Example:**
```php
try {
    $cloned = clone $instance;
} catch (\ByJG\DesignPattern\SingletonException $e) {
    // Handle exception
}
```

#### __sleep()

```php
public function __sleep()
```

Prevents serialization of the singleton instance.

**Throws:** `ByJG\DesignPattern\SingletonException` - Always throws when serialization is attempted

**Example:**
```php
try {
    $serialized = serialize($instance);
} catch (\ByJG\DesignPattern\SingletonException $e) {
    // Handle exception
}
```

#### __wakeup()

```php
public function __wakeup()
```

Prevents unserialization of the singleton instance.

**Throws:** `ByJG\DesignPattern\SingletonException` - Always throws when unserialization is attempted

**Example:**
```php
try {
    $instance = unserialize($data);
} catch (\ByJG\DesignPattern\SingletonException $e) {
    // Handle exception
}
```

## SingletonException

**Namespace:** `ByJG\DesignPattern`
**Extends:** `Exception`

Exception thrown when attempting prohibited operations on a singleton instance.

### When It's Thrown

This exception is thrown in the following scenarios:

1. **Cloning attempt** - When trying to clone a singleton instance
2. **Serialization attempt** - When trying to serialize a singleton instance
3. **Unserialization attempt** - When trying to unserialize a singleton instance

### Properties

Inherits all properties from the standard PHP `Exception` class:

- `$message` - The exception message
- `$code` - The exception code
- `$file` - The filename where the exception was thrown
- `$line` - The line number where the exception was thrown

### Example

```php
use ByJG\DesignPattern\SingletonException;

try {
    $cloned = clone MyClass::getInstance();
} catch (SingletonException $e) {
    echo "Error: " . $e->getMessage();
    // Output: Error: You can not clone a singleton.
}
```

## Usage Example

Complete example showing all API features:

```php
<?php
require "vendor/autoload.php";

use ByJG\DesignPattern\Singleton;
use ByJG\DesignPattern\SingletonException;

class Logger
{
    use Singleton;

    private array $logs = [];

    private function __construct()
    {
        // Initialize logger
    }

    public function log(string $message): void
    {
        $this->logs[] = [
            'time' => time(),
            'message' => $message
        ];
    }

    public function getLogs(): array
    {
        return $this->logs;
    }
}

// Get instance
$logger = Logger::getInstance();
$logger->log("Application started");

// Same instance is returned
$sameLogger = Logger::getInstance();
echo count($sameLogger->getLogs()); // Output: 1

// These operations throw SingletonException:
try {
    clone $logger;
} catch (SingletonException $e) {
    echo $e->getMessage(); // You can not clone a singleton.
}

try {
    serialize($logger);
} catch (SingletonException $e) {
    echo $e->getMessage(); // You can not serialize a singleton.
}
```

## Type Safety

The trait uses the `static` return type for `getInstance()`, which provides proper type hinting in IDEs:

```php
// IDE knows $logger is of type Logger, not just Singleton
$logger = Logger::getInstance();
$logger->log("test"); // IDE autocomplete works correctly
```
