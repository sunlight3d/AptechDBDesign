<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'dbMerciado';
    private $username = 'root';
    private $password = 'root';
    private static $database;
    public static function get_instance() {
        if (!isset(self::$database)) {
            self::$database = new Database();
        }
    }
    
}
?>
