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

```