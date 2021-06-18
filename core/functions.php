<?php
// Format var_dump
function dd($data)
{
    echo '<pre>';
        die(var_dump($data));
    echo '</pre>';
}

// Fetch all data
function fetchAll($db)
{
    $statement = $db->prepare('select * from todos');

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}