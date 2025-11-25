---
sidebar_position: 4
---

# How It Works

## Implementation Details

The `Singleton` trait provides a complete singleton implementation through several key mechanisms:

### Instance Storage

The trait uses a static local variable within the `getInstance()` method to store instances:

```php
public static function getInstance(): static
{
    static $instances;

    $calledClass = get_called_class();

    if (!isset($instances[$calledClass])) {
        $instances[$calledClass] = new $calledClass();
    }
    return $instances[$calledClass];
}
```

This approach allows the trait to manage separate instances for each class that uses it. The `$instances` array is keyed by the class name, ensuring that each class gets its own singleton instance.

### Protected Constructor

The trait provides a protected constructor:

```php
protected function __construct()
{
    // Constructor cannot be public
}
```

Classes using the trait should override this with their own private or protected constructor to prevent direct instantiation.

### Clone Prevention

The `__clone()` magic method is overridden to prevent cloning:

```php
public function __clone()
{
    throw new SingletonException('You can not clone a singleton.');
}
```

### Serialization Prevention

The `__sleep()` magic method prevents serialization:

```php
public function __sleep()
{
    throw new SingletonException('You can not serialize a singleton.');
}
```

### Unserialization Prevention

The `__wakeup()` magic method prevents unserialization:

```php
public function __wakeup()
{
    throw new SingletonException('You can not deserialize a singleton.');
}
```

## Why Use a Trait?

Using a trait for the Singleton pattern offers several advantages:

1. **Reusability** - Apply the pattern to any class without inheritance
2. **No Base Class Required** - Your singleton can extend other classes if needed
3. **Clean Separation** - Pattern implementation is separate from business logic
4. **Type Safety** - Returns `static` type for proper IDE support

## Class Hierarchy Support

Because this implementation uses a trait rather than a base class, your singleton can extend other classes:

```php
class BaseService
{
    protected function log(string $message): void
    {
        // Logging logic
    }
}

class MyService extends BaseService
{
    use \ByJG\DesignPattern\Singleton;

    private function __construct()
    {
        $this->log("Service initialized");
    }
}
```

## Multiple Singleton Classes

Each class that uses the `Singleton` trait gets its own independent instance:

```php
class ConfigManager
{
    use \ByJG\DesignPattern\Singleton;
    private function __construct() {}
}

class DatabaseManager
{
    use \ByJG\DesignPattern\Singleton;
    private function __construct() {}
}

// These are completely separate instances
$config = ConfigManager::getInstance();
$db = DatabaseManager::getInstance();
```

## Limitations

:::warning Constructor Arguments
The singleton pattern as implemented does not support constructor arguments. This is by design - the first call to `getInstance()` has no arguments to pass. If you need configuration, use setter methods after getting the instance.
:::

:::info No Lazy Initialization Control
The instance is created on the first call to `getInstance()`. There's no mechanism to delay instantiation further or pre-initialize instances.
:::

## Next Steps

- [API Reference](api-reference.md)
- [Creating a Singleton Class](creating-singleton.md)
