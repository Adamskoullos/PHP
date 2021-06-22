# Creating a DI container

DI containers are used to move $app['config'] array items into a class. This gives the data more protection by controlling how the data is interacted with via methods and also makes working with the data slightly more efficient.

1. Create an `App.php` **class** file:
```php
<?php

class App{

    protected static $registry = [];
    
    public static function bind($key, $value){
        static::$registry[$key] = $value;
    }

    public static function get($key){
        if(!array_key_exists($key, static::$registry)){
            throw new Exception("No $key is bound in the container");
        }

        return static::$registry[$key];
    }
}

```

2. Bind the `configuration array` and a `new instance of QueryBuilder` to the registry:

```php
// bootstrap.php

<?php

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database']))); 

```

3. Add `App.php` to the composer dependancy autoload class file by: `composer dump-autoload` in the terminal

4. Update files to use `App::get('database')` when interacting with the db

```php
// index.php
$users = App::get('database')->fetchAll('users', 'User');
```