# Process

The user fills in the form within `index.view.php`, which via the `action` attribute within the form triggers the `add-name.php` controller file to run. This happens as the `routes.php` file directs **POST** requests with `name` to the `add-name.php` controller.

```php
// index.view.php Form
<form method="POST" action="/names">
    <input name="name"></input>
    <button type="submit">Submit</button>
</form>

```


Then within the controller `add-name.php` the database `mytodos` is accessed, invoking the `insert()` method within `QueryBuilder.php`. This passes in the table `users` and the user input from the form `$_POST['name']`:

```php

// add-name.php
$app['database']->insert('users', [
    'name' => $_POST['name']
]);

// Ref: $app['database'] comes from:
// bootstrap.php
$app = [];

$app['config'] = require 'config.php';

require 'core/Router.php';
// require 'core/Request.php';
require 'core/database/connection.php';
require 'core/database/QueryBuilder.php';

$app['database'] = new QueryBuilder(Connection::make($app['config']['database']));

// And includes:
// config.php
<?php

return [
    'database' => [
        'name' => 'mytodo',
        'username' => 'adam',
        'password' => 'admin',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];

```

The `insert()` function comes from `QueryBuilder.php` and takes in two arguments. The table to be added to and the key: name/value: userInput array as `$params`.
The implode methos is used to extract each key and value for the second and third arguments. 

The `insert` query is saved to `$sql`, then used in the `prepare` statement. Then finally the `$params` argument is passed in to the `execut()` method.  

```php
public function insert($table, $params){

        $sql = sprintf('insert into %s (%s) values (%s)', 
        
        $table,
        
        implode(', ', array_keys($params)), 
        
        // implode(',', array_values($params))
        ':' . implode(', :', array_keys($params))
    
        );

        // print_r($sql);

        $statement = $this->pdo->prepare($sql);

        $statement->execute($params);
    }
```