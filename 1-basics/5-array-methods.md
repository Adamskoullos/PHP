# Common Array Methods and Syntax

```php
// Filter for incomplete tasks
$incompleteTasks = array_filter($tasks, function($task){
    return ! $task->complete;
});

// Map does not mutate the original/passed in data
$newArray = array_map(function ($task){
    // do something with each task
}, $tasks);

// Column also does not mutate original and is used to make new array of keys or values
$keysArr = array_column($tasks, 'text');

```