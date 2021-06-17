<?php

class Task{
    public $description;
    public $completed = false;

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