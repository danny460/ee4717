<?php
    function db_connect() {
        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;
        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
            $config = parse_ini_file(dirname(__FILE__) . '/../config.ini');     
            $connection = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);    
            if($connection->connect_error === false){
                die("Connection failed: " . $conn->connect_error);           
            }
        }
        return $connection;
    }
?>