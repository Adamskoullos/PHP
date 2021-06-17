<?php

class Connection
{
    public static function make(){
        try {
            return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}