<?php
include_once __DIR__ . "/../config/config.php";

class Database {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            try {
                $conn = new PDO("mysql:host=" . HOST, USERNAME, PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec("CREATE DATABASE IF NOT EXISTS " . DBNAME);
                $conn->exec("USE " . DBNAME);
                $conn->exec(SQL_DATABASE);
                
                $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
}

class connect extends Database {
    private function exec($request, $values = null) {
        $req = $this->db->prepare($request);
        $req->execute($values);
        return $req;
    }

    public function setFetchMode($fetchMode) {
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
    }

    public function execute($request, $values = array()) {
        $results = self::exec($request, $values);
        return ($results) ? true : false;
    }

    public function fetch($request, $values = null, $all = true) {
        $results = self::exec($request, $values);
        return ($all) ? $results->fetchAll() : $results->fetch();
    }
}

new connect();
?>
