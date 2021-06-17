# Connecting to MySQL with PDO

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Create the PDO db key
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
} catch (PDOException $e) {
    die($e->getMessage());
}

// 2. Prepare the query statement
$statement = $pdo->prepare('select * from todos');

// 3. Execute/initialise the statement
$statement->execute();

var_dump($statement->fetchAll());


require 'index.view.php';

```