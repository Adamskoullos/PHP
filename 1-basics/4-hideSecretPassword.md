# Securing UserName and Password Details

When connecting to the database, we need to provide a MySql username and password. Rather than hard code this information directly into the PDO we can extract into a `config.php` file.

1. First we create the config file:

```php
<?php

return [
    'database' => [
        'name' => 'mytodo',
        'username' => 'adam',
        'password' => 'admin',
        'connection' => 'mysql:host=localhost',
        'options' => []
    ]
];
```

2. Then we can import the file into `bootstrap.php` saving the returned value to ($config) and passing the `database` config array down into the `make($config['database])` method:

```php
<?php

$config = require 'config.php';

require 'database/connection.php';
require 'database/QueryBuilder.php';

return new QueryBuilder(Connection::make($config['database']));
```

3. Then we can access each `value` by adding its `key` within the new PDO instance. Here is the pattern:

```php
// connection.php
<?php

class Connection
{
    public static function make($config){
        try {
            // return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');

                return new PDO(
                    $config['connection'].';dbname='.$config['name'],
                    $config['username'],
                    $config['password']
                );

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
```
