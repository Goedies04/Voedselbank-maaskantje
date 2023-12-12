<?php

class Database {
    private $con;

    function __construct(){
        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "voedselbankmaaskantje");
        define("DB_PORT", "");
    }

    function connect() {
        try {
            $this->con = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER,DB_PASSWORD);
            return $this->con;
        } catch (PDOException $e) {
            echo "Error ". $e->getMessage();
        }
    }
}
