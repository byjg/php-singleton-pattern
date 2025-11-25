---
sidebar_position: 2
---

# Creating a Singleton Class

## Basic Implementation

To create a singleton class, use the `Singleton` trait and ensure your constructor is private or protected:

```php
<?php
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

## Important Rules

:::danger Constructor Visibility
Your class **MUST** use a private or protected constructor. If the constructor is public, the singleton pattern will be broken as users could create multiple instances directly.
:::

:::warning No Constructor Arguments
Singleton classes do not accept arguments in the constructor. Use setter methods or configure the instance after retrieval if you need to customize it.
:::

:::info Protected Operations
Attempting to clone, serialize, or unserialize a singleton will throw a `SingletonException`.
:::

## Real-World Example

```php
<?php
class DatabaseConnection
{
    use \ByJG\DesignPattern\Singleton;

    private $connection;

    private function __construct()
    {
        // Establish database connection once
        $this->connection = new PDO(
            'mysql:host=localhost;dbname=mydb',
            'user',
            'password'
        );
    }

    public function query(string $sql): array
    {
        return $this->connection->query($sql)->fetchAll();
    }
}
```

## What You Get

When you use the `Singleton` trait, you automatically get:

- **getInstance()** - Static method to retrieve the single instance
- **Clone protection** - `__clone()` throws `SingletonException`
- **Serialization protection** - `__sleep()` throws `SingletonException`
- **Unserialization protection** - `__wakeup()` throws `SingletonException`

## Next Steps

- [Using Your Singleton](using-singleton.md)
- [API Reference](api-reference.md)
