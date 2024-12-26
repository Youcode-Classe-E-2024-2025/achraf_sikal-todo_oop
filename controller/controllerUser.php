<?php
include_once __DIR__ . '/../classes/Database.php';

class TaskController
{
    private $db;

    public function __construct()
    {
        $this->db = new connect();
    }

    public function createTask($taskName)
    {
        $sql = "INSERT INTO tasks (name) VALUES (:name)";
        $values = ['name' => $taskName];

        if ($this->db->execute($sql, $values)) {
            echo "Task added successfully!";
        } else {
            echo "Failed to add task.";
        }
    }

    public function getTasks()
    {
        $sql = "SELECT * FROM tasks";
        return $this->db->fetch($sql);
    }
}
