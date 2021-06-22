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