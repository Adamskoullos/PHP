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
```