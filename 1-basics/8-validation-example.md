# Simple form validation workflow

This example creates and uses a `Validation` class.

First up here is the validation class:

```php
// userValidation.php
<?php

class UserValidator{

    private $data; // Becomes an associative array with userName & email
    private $errors = []; // An associative arry with key/value pairs
    private static $fields = ['userName','email'];

    public function __constructor($post_data){
        $this->data = $post_data;
    }

    public function validateForm(){
        foreach(self::$fields as $field){ // Use 'self::' when 'static'
            if(!array_key_exists($field, $this->data)){ // array method to check if exists
                trigger_error("$field is not present in the data"); 
                return;
            }
        }

        $this->validateUserName(); // Can call private function like this
        $this->validateEmail();
        return $this->erros;
    }

    private function validateUserName(){
        $val = trim($this->data['userName']);

        if(empty($val)){
            $this->addError('userName','User name cannot be empty');
        } else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
            $this->addError('username','User name must be 6-12 chars & alphanumeric');
      }
        }
    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email','Email cannot be empty');
        } else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'Email must be a valid email address');
            }
        }
    }

    private function addError($key, $val){
        $this->error[$key] = $val;
    }
}

```

Here is the `index.php` what would be the controller:

```php
// index.php
<?php 

    // require the 'userValidation.php' class file
require 'userValidation.php';
    // If the user has submitted the form, run the validation code
if(isset($_POST['submit'])){

    // validate entries

    // Create new instance, post data is an array ['username','email']
    // Form post data is assigned to $data the private property within the new instance
    $validation = new UserValidation($_POST);

    // Save the result to an errors variable
    // invoke the public function which has access to the $data property
    $errors = $validation->validateForm();

    // If no errors POST data to db and trigger workflow

    // If $errors has a value then render to the DOM

require 'index.view.php'; // Gives access to the view for any data ($errors)
}

?>
```
```html
<!-- index.view.php -->
<html lang="en">
<head>
  <title>PHP OOP</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  
  <div class="new-user">
    <h2>Create a new user</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

      <label>username: </label>
      <!-- Show user input unless first time page has loaded using the 'value' attribute-->
      <input type="text" name="username" value="<?=  htmlspecialchars($_POST['username']) ?? ''; ?>">
      <!-- If there is an error show the value, if not show an empty string (nothing) -->
      <div class="error"><?= $error['username'] ?? ''; ?></div>

      <label>email: </label>
      <!-- Show user input unless first time page has loaded using the 'value' attribute-->
      <input type="text" name="email" value="<?=  htmlspecialchars($_POST['email']) ?? ''; ?>">
      <!-- If there is an error show the value, if not show an empty string (nothing) -->
      <div class="error"><?= $error['email'] ?? ''; ?></div>

      <input type="submit" value="submit" name="submit">

    </form>
  </div>

</body>
</html>

```