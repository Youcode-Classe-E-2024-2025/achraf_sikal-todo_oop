<?php
include_once __DIR__ . "/../config/config.php";

class Database
{
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException) {
            $conn = new PDO("mysql:host=". HOST , USERNAME, PASSWORD);
            $conn->exec("CREATE DATABASE IF NOT EXISTS TODO;");
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $conn->exec(SQL_DATABASE);
        }
    }
}
new Database();