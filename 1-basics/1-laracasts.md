# Set up dev server

Within the project directory use the following pattern:

-S <addr>:<port> Run with built-in web server.

**Note**: Make sure to use a capital `-S`:

```php
php -S localhost:8888
```

Then the local host url is provided in the terminal once the server is live:

```
adam@Debian:~/Documents/github/PHP$ php -S localhost:8888
[Tue Jun 15 16:35:55 2021] PHP 8.0.7 Development Server (http://localhost:8888) started
```

# Single Quotes vs Double Quotes

### Single Quotes:

When using single quotes with strings and variables we use the `.` to concatenate the two:
`echo 'Hello '` . $variable;

### Double Qoutes:

Using double quotes is like string interpolation and dynamic variables can go straight in:
`echo "Hello $variable";`

# Grabbing and using global variables with HTML

```php
<h1>
    <?php
        $name = $_GET['name'];

        echo "Hello $name";
    ?>
</h1>

// Or this is another option using concatonation

<h1>
    <?php echo "Hello " . $_GET['name']; ?>
</h1>

// This can be shortened by removing the php and echo and adding an =

<h1>
    <?= "Hello " . $_GET['name']; ?>
</h1>

```

The above example is at risk of html injection though so it is better to use a built in method:

```php
// This sanitizes any html, preventing html injection
<h1>
    <?= "Hello " . htmlspecialchars($_GET['name']); ?>
</h1>

```

# Separating HTML and PHP

**index.php**: php - Note how we `require` the html view, this is how the files connect.

The pattern here: Prepare data (index.php) > load a view (index.view.php) > Within the view use nested php to run code (for loops etc).

```php
<?php

$greeting = 'Hello from variable';

require 'index.view.php';
```

**index.view.php**: html

```html
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <style>
      header {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>
        <?= $greeting ?>
      </h1>
    </header>
  </body>
</html>
```

# PHP Arrays

**Structure and Syntax**:

```php
// index.php
$names = [
    'dave',
    'jon',
    'ben'
];

foreach($names as $name){...}


// index.view.php
// Two ways of working a for loop
<ul>
    <?php foreach($names as $name) : ?>

        <li><?= $name ?></li>

    <?php endforeach; ?>
</ul>
<ul>
    <?php

        foreach($names as $name){
            echo "<li> $name </li>";
        }

    ?>
</ul>
```

## Associative Arrays

An associative array uses `key`/`value` pairs. Here is the syntax:

```php
$person = [
    'age' => 30,
    'name' => 'Dave',
    'eyes' => 2
]
```

```html
<ul>
  <!-- This way provides the value -->
  <?php foreach($person as $p) : ?>

  <li><?= $p ?></li>

  <?php endforeach; ?>
</ul>
<ul>
  <!-- This way provides both the key and value -->
  <?php foreach($person as $key =>
  $val) : ?>

  <li>
    <strong><?= $key ?></strong>:
    <?= $val ?>
  </li>

  <?php endforeach; ?>
</ul>
```

## Add item to Associative Array

```php
$person['job'] = 'racer';

```

## Add item to Basic Array

```php
$names[] = 'jerry';
```

## Remove item from Array

```php
unset($person['age']);

```

# Checking the value of an Array

```php
var_dump($person);
print_r($person);
echo $person;

```

# Capitalising first letter of each word

```php
<li><strong><?= ucwords($key); ?></strong>: <?= $val ?></li>
```

# Multi-Dimension Arrays

Accessing **indexed arrays** (second item in the first array):

`$array[0][2]`

Accessing **associative arrays** within an **indexed array**.
Grab the title value for the first nested array:
`$array[0]['title']` 

# Array pop and push

Add item to array: `$array[] = ['newItem']`

Remove the last item: `$popped = array_pop($array)`


# Working with Booleans

Just rendering the boolean value will either print nothing for false or a '1' for true. This is not much use.

This is fine within an if statement but when rendering to the DOM better to use with a ternary statement:

```php
true ? 'if true do this' : 'if false do this'

```
Rather than looping through an array we can pluck specific keys and dynamically show the value of that key.
The below example demonstrates the pattern for this as well as using the `ternary` to control what is shown:

```html
<ul>
    <li>
        <strong>Stack: </strong><?= $devStack['stackName']; ?>
    </li>
    <li>
        <strong>Front-End Framework: </strong><?= $devStack['front-end']; ?>
    </li>
    <li>
        <strong>Back-End Framework: </strong><?= $devStack['back-end']; ?>
    </li>
    <li>
        <strong>Cloud Infrastructure: </strong><?= $devStack['cloud']; ?>
    </li>
    <li>
        <strong>Are the team AWS Certified: </strong><?= $devStack['boolean'] ? 'All the team is AWS Cerified' : 'No AWS Cerifiication'; ?>
    </li>
</ul>

```

# Conditionals

```php
// If Statement
<?php

  if($devStack['boolean']){
    echo 'True';
  } else{
    echo 'False';
  }
?>
// Ternary
<?= $devStack['boolean'] ? 'True' : 'False'; ?>

```
For the short hand `if` statement we can use the same pattern as the foreach:

```php
<?php if($devStack['boolean']) : ?>

// Code to run if true or
// Html to render if true

<?php else : ?>

// html to render if false

<?php endif; ?>

```

# Functions

Create a file for some kind kind of functionality and then `require` the file into `index.php` at the top of the file so it can be accessed anywhere below. Define all fucntions within the function file and then invoke them where needed.

```php
<?php
// functions.php file
function ageChecker($val){
    if($val < 18){
        return 'You are too young';
    }
    if($val >= 18 && $val < 61){
        return 'You are old enough to drink';
    }
    if($val > 60){
        return 'You probably should not drink at your age!';
    }
};

// index.php file
require 'functions.php';

$result = ageChecker(70);

```
```html
<!-- index.view.html -->
<h1>
    <?= $result; ?>
</h1>
```

# Classes

### Definition & Syntax

```php
class Task{
    protected $description; 
    protected $completed = false;
    public function __construct($description)
    {
    // Automatically triggered on instantiation (new Product(desc))
        $this->description = $description;
    }
    public function isComplete()
    {
        return $this->completed;
    }
    public function toggleComplete()
    {
        $this->completed = !$this->completed;
    } 
}
```


# Session Super Globals

Session super globals can be used to store and pass data between files that persist state for that session only:

```php

// As the user submits a form a new seesion is started and the form data is input is saved to a session super global:

// Controller 
if(isset($_POST['submit'])){
    
    session_start();

    $SESSION['name'] = $_POST['name'];
}

// Accessing the session super global within another component
$name = $_SESSION['name'];

// Overriding session variable
$_SESSION['name'] = 'newName';

// Delete single session super global
unset($_SESSION['name']);

// Delete all session super globals
session_unset();
```

# Null Coalescing

```php

$var = 'This if exists' ?? 'This if it doesnt';

```

# Cookies

Cookies are also super globals however they are stored on the users machine instead of the sever and can be accessed each time they log into the webiste. They can be set as a user submits a form and the user input is grabbed.

Arguments:

1. Save as
2. User input to be saved
3. Time till expiry 

```php
if(isset($_POST['submit'])){
    
    session_start();

    $SESSION['name'] = $_POST['name'];
    // Set the cookie
    setcookie('gender', $_POST['gender'], time() + (86400 * 5));// Store for 5 days
}


// Get the cookie and save to a variable to use within component
$gender = $_COOKIE['gender'] ?? 'Unkown';

```

# Working with the file system

Basic file methods:

```php
// Check file exists
file_exists($file);

// Read file
readfile($file);

// Copy file
copy($file, 'newFile.txt');

// Get the absolute path
realpath($file);


// Get file size
filesize($file);

// Rename
rename($file, 'newName.txt');

// Opeing a file for reading and create a reference
$handle - fopen($file, 'a+'); // 'r' = read, 'r+' = read and write, 'a+' = pointer at end of file text, ready for write

// Read file
fread($handle, filesize($file)); // whole file

// Read single line
fgets($handle);

// Read single character
fgetc($handle);

// Writing to a file
fwrite($handle, )

// Close file
fclose($handle);

// Delete file
unlink($file); // The file itself, not the reference 
```



