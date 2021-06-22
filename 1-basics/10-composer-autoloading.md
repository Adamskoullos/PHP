# Composer is the PHP version of NPM

## Installation - Install composer cli to machine 

Install:
`sudo curl -Ss https://getcomposer.org/installer | php`
Move to PATH file to use globally:
`sudo mv composer.phar /usr/local/bin/composer`

`chmod +x /usr/local/bin/composer`

## Add to project

1. Set up the composer.json file:

Set autoload to all class files
```php
// composer.json
{
    "autoload": {
        "classmap": [
            "./"
        ]
    }
}

```

2. Install composer to project: `composer install` within project dir

3. Add `Require 'vendor/autoload.php';` to the project entry point. At the top of the `index.php` file

4. Once in place the below `index.php` entry point file does not need the commented out `requires`:

```php
// index.php
<?php

$app = [];

$app['config'] = require 'config.php';

// require 'core/Router.php';
// require 'core/Request.php';
// require 'core/database/connection.php';
// require 'core/database/QueryBuilder.php';

$app['database'] = new QueryBuilder(Connection::make($app['config']['database'])); 
```