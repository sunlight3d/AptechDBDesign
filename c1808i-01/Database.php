<?php 
    class Database {
        private $connection;
        function __construct() {
            $hostname = "localhost";
            $port = "3306";
            $databaseName = "dbmerciado";
            $databaseUserName = "root";
            $databasePassword = "";
            $this->connection = mysqli_connect(
                $hostname,
                $databaseUserName,
                $databasePassword,
                $databaseName);
    
            if (!$this->connection) {
                echo "<h2>Failed to connect to MySQL: " . mysqli_connect_error()."</h2>";
            } else {
                echo "<h2>Connect DB Successfully</h2>";
            }
        }
        function get_connection() {
            return $this->connection;
        }
    }
?>