# php-query-builder
Fast PHP query builder created using PHP. 

## Instalation

Because of `PSR-4` autoloading, this package can be installed with composer.

```
$ composer require 'lukafurlan/php-query-builder'
```

To make this package work and connect to the database you have to define these constants.
```php 
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'database');
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', 'password');
```

## Usage examples

#### Select

```php 
$queryManager = new DMLQueryManager();
```

```php 
$queryManager->select()
    ->columns(["id"])
    ->from("users")
    ->where(["country = :country"])
    ->bind([":country" => "Slovenia"])
    ->execute();
```

#### Insert
```php 
$queryManager->insert()
    ->into("users")
    ->columns(["name", "country"])
    ->values([
        ["Luka", "Slovenia"],
        ["John", "England"]
    ])
    ->execute();
```

#### Update
```php 
$queryManager->update()
    ->table("users")
    ->columns([
        "country" => "Germany"
    ])
    ->where(["country = :country"])
    ->bind([":country" => "England"])
    ->execute();
```

#### Delete
```php 
$queryManager->delete()
    ->from("users")
    ->where(["country = :country"])
    ->bind([":country" => "England"])
    ->execute();
```