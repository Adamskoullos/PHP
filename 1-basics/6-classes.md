# Class Structure & Constructor

**Note**: Using the `protected` keyword instead of the `private` keyword to make properties private allows extended classes to access the properties.

```php
<?php

class User{

    protected $userName;
    protected $email;
    public $role = 'User';

    public function __construct($userName, $email){
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUser(){
        return $this->userName;
    }

    public function setUser($name){
        $this->userName = $name;
    }

}


```

# Inheritance

New classes can be created from existing classes and they inherit the existing class properties and methods. The new class can also add it's own properties and methods:

```php
class AdminUser extends User{
    // Add extra properties
    public $authLevel;
    // Override $role value of normal 'User'
    public $role = 'Admin';

    public function __construct($userName, $email, $authLevel){
        // Assign extra properties
        $this->authLevel = $authLevel;
        // Use the parent constructor to assign original properties
        parent::__construct($userName, $email);

    }

    // Add any further methods here
    public function  addUser(){...}
}

```

# Magic Methods

Magic methods use the double underscore: `__magicMethod()`:

1. `__construct();`
2. `__destruct();`
3. `__clone();`

Once a php file is run, php automatically removes any instances of a class by using the `__destruct()` method. This is done under the hood.

There are many magic methods....this section to be returned to and built upon...

# Static Properties and Methods

We can use `static` properties and methods when the class does not have many instances but rather is used as a utility class, for example: `QueryBuilder`.

**Note**: When we use the static keyword we add the `$` sign in front of the `property`:

```php
class Weather{

    public static $temp;

    public static function celsiusToFarenheit($c){
        return $c * 9 ? + 32;
    }

}

// Access property
print_u(Weather::$temp);

// Access function
echo(Weather::celsiusToFarenheit(20));

```
