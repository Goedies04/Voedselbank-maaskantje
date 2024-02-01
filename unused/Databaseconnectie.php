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
        $this->con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Check connection
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }

        return $this->con;
    }
}
?>

