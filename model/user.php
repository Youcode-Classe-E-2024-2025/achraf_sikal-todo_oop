<?php

include("../classes/Database.php");

class Auth {
    public $database;

    public function __construct() {
        $this->database = new connect();
    }

    public function insertUser($firstname, $lastname, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO Users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
        return $this->database->execute($query, [$firstname, $lastname, $email, $hashedPassword]);
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM Users WHERE email = ?";
        return $this->database->fetch($query, [$email], false);
    }
}
?>
