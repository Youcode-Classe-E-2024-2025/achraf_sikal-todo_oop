<?php

include("../classes/Database.php");

class ModelTask {
    public $database;

    public function __construct() {
        $this->database = new connect();
    }

    public function insertTask($title, $description) {
        $query = "INSERT INTO Tasks (title, description) VALUES (?, ?)";
        return $this->database->execute($query, [$title, $description]);
    }

    public function getTasks() {
        $query = "SELECT * FROM Tasks";
        return $this->database->fetch($query, null, true);
    }
}
// $model = new ModelTask();
// $result = $model->insertTask("Title of Task", "Description of Task", "To Do", "Simple");
// $tasks = $model->getTasks();

// if ($result) {
//     echo "Task inserted successfully!";
//     var_dump($result);
// } else {
//     echo "Error inserting task.";
// }

// echo "<pre>";
//     print_r($tasks);
// echo "</pre>";
?>



?>

