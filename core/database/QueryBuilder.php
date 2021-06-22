<?php

require 'core/classes.php';

class QueryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo; 
    }

    public function fetchAll($table, $intoClass)
    {
        $statement = $this->pdo->prepare("select * from $table");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }

    public function insert($table, $params){

        $sql = sprintf('insert into %s (%s) values (%s)', 
        
        $table,
        
        implode(', ', array_keys($params)), 
        
        // implode(',', array_values($params))
        ':' . implode(', :', array_keys($params))
    
        );

        // print_r($sql);

        $statement = $this->pdo->prepare($sql);

        $statement->execute($params);
    }
    
}