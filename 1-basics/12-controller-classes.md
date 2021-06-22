# Refactoring to Controller Classes

1. Create a controller class to house methods for each page controller:

```php
// PagesController.php
<?php

class PagesController{

    public function home(){
        
        $users = App::get('database')->fetchAll('users', 'User');
        
        require 'views/index.view.php';
    }

    public function about(){
        $tasks = App::get('database')->fetchAll('todos', 'Task');

        require 'views/about.view.php';
    }

    public function contact(){
        $tasks = App::get('database')->fetchAll('todos', 'Task');

        require 'views/contact.view.php';
    }

}
```

2. Delete single page controller files and `composer dump-autoload` to update the class_map

3. 