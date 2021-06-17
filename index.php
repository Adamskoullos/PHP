<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Create the PDO db key
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
} catch (PDOException $e) {
    die($e->getMessage());
}

// 2. Prepare the query statement
$statement = $pdo->prepare('select * from todos');

// 3. Execute/initialise the statement
$statement->execute();

// 4. Save the fetched data to a variable to be used within index.view.php to render DOM
$tasks = $statement->fetchAll(PDO::FETCH_OBJ);

// var_dump($statement->fetchAll(PDO::FETCH_OBJ));


require 'index.view.php';