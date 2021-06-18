# Connecting to MySQL with PDO

The below pattern is the core nuts and bolts of connecting to the db and accessing data:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inport classes.php to get access to Task in order to save the data 
require 'classes.php';

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

// 4.A Save the fetched data to a variable to be used within index.view.php to render DOM
// $tasks = $statement->fetchAll(PDO::FETCH_OBJ);

// 4.B Optional save data to class
// Add functionality by saving the data to a class so the data can be interacted with via methods
$tasks = $statement->fetchAll(PDO::FETCH_CLASS, 'Task');

// var_dump($statement->fetchAll(PDO::FETCH_OBJ));


require 'index.view.php';

```

The above pattern is abstracted by extracting the logic into functions with `functions.php`:

# Abstraction Level 1

1. Create `functions.php` and extract PDO:

```php
// Connect to database
function connectToDb()
{
    try {
        return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
```
2. Import `function.php` into `index.php` and save the returned value:

```php
require 'functions.php';

$pdo = connectToDb();
```

3. Extract the fetching of data to `functions.php` and then save the returned value to a variable back in `index.php`:

```php
// functions.php
// Fetch all data
function fetchAll($db)
{
    $statement = $db->prepare('select * from todos');

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}


// index.php
// 2. Save fetched data to a variable
$tasks = fetchAll($pdo); 
```

# Abstraction Level 2
The focus is on extracting logic from individual functions into classes. 

1. The connect logic is extracted to a `connection` class within `connection.php`. **Note**: We are using a `static` function meaning when invoked we use a different pattern to access the `make()` function:

```php
class Connection
{
    public static function make(){
        try {
            return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

// index.php

// Create the PDO db key
$pdo = connection::make();
```

# Abstraction Level 3
The focus here is on grouping class files into a `bootstrap.php` file to house all the class locig and extract this from `index.php`.

1. Create `bootstrap.php` file and import both `connection.php` and `QueryBuilder.php` class files

```php
// bootstrap.php
<?php

require 'database/connection.php';
require 'database/QueryBuilder.php';
```
2. Create a query with `QueryBuilder` passing in the `connection` and return the output.

```php
// bootstrap.php
return new QueryBuilder(Connection::make()); 
```
3. Back in `index.php` we require `bootstrap.php` saving the returned output to a variable ($query). This is used when invoking the `fetchAll` method which is accessed from `QueryBuilder`. We pass in the **table** to query and the **class** to save the fetched data to. Finally the response is saved to ($tasks) which can be used within the DOM as at the bottom of `index.php` we require `index.view.php`:   

```php
// index.php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = require 'database/bootstrap.php';

// Use the query to select the data and save to a variable 
$tasks = $query->fetchAll('todos', 'Task');
// dd($tasks);


require 'index.view.php';
```

**Reference**:

```php
// connection.php
<?php

class Connection
{
    public static function make(){
        try {
            return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

// QueryBuilder.php
<?php

require 'classes.php';

class QueryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo; 
    }

    function fetchAll($table, $intoClass)
    {
        $statement = $this->pdo->prepare("select * from $table");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }
}
```