<?php
class connect
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "TODO";
    public function __construct($sql)
    {
        try {
            $conn = new PDO("mysql:host=".($this->servername).";dbname=".($this->dbname), $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
        } catch(PDOException $e) {
            $conn = new PDO("mysql:host=".($this->servername), $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
        }
        $conn = null;
    }
}
new connect("CREATE DATABASE IF NOT EXISTS TODO;");
new connect(
    "CREATE TABLE IF NOT EXISTS Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(50) NOT NULL,
    firstname Varchar(50) NOT NULL,
    email VARCHAR(100),
    role ENUM('Manager', 'User') DEFAULT 'User',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);"
    );
new connect(
    "CREATE TABLE IF NOT EXISTS Tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    status ENUM('To Do', 'In Progress', 'Done') DEFAULT 'To Do',
    task_type ENUM('Simple', 'Bug', 'Feature') DEFAULT 'Simple',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);"
    );
new connect(
    "CREATE TABLE IF NOT EXISTS UserTasks (
    user_id INT,
    task_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id) ON DELETE CASCADE
    );"
    );