---
sidebar_position: 3
---

# Using Your Singleton

## Getting the Instance

Use the static `getInstance()` method to retrieve the singleton instance:

```php
// Get the singleton instance
$example = Example::getInstance();
```

## Instance Persistence

The same instance is always returned, ensuring singleton behavior:

```php
// Get the singleton instance
$example = Example::getInstance();

// Get another reference to the same instance
$anotherReference = Example::getInstance();

// Modify the property
$example->someProperty = "Changed value";

// This will output "Changed value" because both variables reference the same instance
echo $anotherReference->someProperty; // Output: Changed value
```

## What You Cannot Do

### Cloning is Prohibited

Attempting to clone a singleton instance will throw a `SingletonException`:

```php
try {
    $cloned = clone $example;
} catch (\ByJG\DesignPattern\SingletonException $e) {
    echo "Cannot clone a singleton!";
}
```

### Serialization is Prohibited

Attempting to serialize a singleton will throw a `SingletonException`:

```php
try {
    $serialized = serialize($example);
} catch (\ByJG\DesignPattern\SingletonException $e) {
    echo "Cannot serialize a singleton!";
}
```

### Unserialization is Prohibited

Attempting to unserialize a singleton will throw a `SingletonException`:

```php
try {
    $unserialized = unserialize($someSerialized Data);
} catch (\ByJG\DesignPattern\SingletonException $e) {
    echo "Cannot deserialize a singleton!";
}
```

## Best Practices

:::tip Use for Shared State
Singletons are ideal for managing shared state or resources, such as:
- Database connections
- Configuration objects
- Logging services
- Cache managers
:::

:::warning Thread Safety
This implementation is not thread-safe in multi-threaded environments. For such cases, consider using proper locking mechanisms.
:::

:::caution Testing Considerations
Singletons can make unit testing more difficult because they maintain state across tests. Consider using dependency injection for better testability.
:::

## Next Steps

- [How It Works](how-it-works.md)
- [API Reference](api-reference.md)
