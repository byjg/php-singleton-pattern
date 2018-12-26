# Singleton Pattern

[![Build Status](https://travis-ci.org/byjg/SingletonPatternPHP.svg?branch=master)](https://travis-ci.org/byjg/SingletonPatternPHP)
[![Maintainable Rate](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Reliability Rate](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Security Rate](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=security_rating)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Quality Gate](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=alert_status)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Code Coverage](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=coverage)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=bugs)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=code_smells)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Techinical Debt](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=sqale_index)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=SingletonPatternPHP&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=SingletonPatternPHP)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/byjg/SingletonPatternPHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/byjg/SingletonPatternPHP/?branch=master)
[![Code Climate](https://codeclimate.com/github/byjg/SingletonPatternPHP/badges/gpa.svg)](https://codeclimate.com/github/byjg/SingletonPatternPHP)


A lightweight PHP implementation of the Design Pattern Singleton using trait.
Just one class and no dependencies. 

# Usage

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

# Install

```
composer require "byjg/singleton-pattern=~1.0"
```

# References

* https://en.wikipedia.org/wiki/Singleton_pattern


