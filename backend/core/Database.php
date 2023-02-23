<?php
require_once 'dbconfig.php';

class Database {
    private $connection;

    // Creating Connection
    function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->connection->connect_error) die("Could not establish connection with database: " 
        . $this->connection->connect_error);

        // echo "Connection created successfully";
    }


    // Fetching Data from Database
    public function fetchData() {
        $sql = "SELECT * FROM production ORDER BY sku" ;
        $result = $this->connection->query($sql);
        if(!$result) die("could not extract data from database: " . $this->connection->connect_error);

    }

    public function getConnection() {
        return $this->connection;
    }
}

$connect = new Database();
$connection = $connect->getConnection();