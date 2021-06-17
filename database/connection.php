<?php

class Connection
{
    public static function make($config){
        try {
            // return new PDO('mysql:host=localhost;dbname=mytodo', 'adam', 'admin');

                return new PDO(
                    $config['connection'].';dbname='.$config['name'],
                    $config['username'],
                    $config['password']
                );

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}