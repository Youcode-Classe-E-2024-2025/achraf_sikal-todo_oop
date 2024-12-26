<?php
include_once __DIR__ . "/../config/config.php";
///////// OOP  ////
class Database
{
    protected $db;
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException) {
            $conn = new PDO("mysql:host=". HOST , USERNAME, PASSWORD);
            $conn->exec("CREATE DATABASE IF NOT EXISTS TODO;");
            $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $this->db->exec(SQL_DATABASE);
        }
    }
}
class connect extends Database
{
    /**
    * Execute an SQL query and return the result (prepared request or not)
    * @param string $request SQL query
    * @param array|null $values Optional values
    * @return PDOStatement
    */
    private function exec($request, $values = null)
    {
        $req = $this->db->prepare($request);
        $req->execute($values);
        return $req;
    }
    /**
    * Define the fetchMode
    * @param int $fetchMode fetchMode
    */
    public function setFetchMode($fetchMode)
    {
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
    }

    /**
     * Execute an SQL query and return the status
    * @param string $request SQL query
    * @param array|null $values Optional values
    * @return bool Result of the request
    */
    public function execute($request, $values = array())
    {
        $results = self::exec($request, $values);
        return ($results) ? true : false;
    }
    
    /**
     * Execute an SQL query and return row(s) of the result
    * @param string $request SQL query
    * @param array|null $values Optional values
    * @param bool $all Query with several rows or not
    * @return array|mixed Return data
    */
    public function fetch($request, $values = null, $all = true)
    {
        $results = self::exec($request, $values);
        return ($all) ? $results->fetchAll() : $results->fetch();
    }
}
// new connect();
