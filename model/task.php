<?php

include("../classes/Database.php");

class ModelTask {
    public $database;

    public function __construct() {
        $this->database = new connect();
    }

    public function insertTask($title, $description, $status, $task_type) {
        $query = "INSERT INTO Tasks (title, description, status, task_type) VALUES (?, ?, ?, ?)";
        return $this->database->execute($query, [$title, $description, $status, $task_type]);
    }

    public function getTasks() {
        $query = "SELECT * FROM Tasks";
        return $this->database->fetch($query, null, true);
    }
}

$model = new ModelTask();
$result = $model->insertTask("Title of Task", "Description of Task", "To Do", "Simple");

if ($result) {
    echo "Task inserted successfully!";
} else {
    echo "Error inserting task.";
}

?>

