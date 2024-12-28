<?php

include __DIR__ ."/../classes/Database.php";
include_once __DIR__ . "/../config/config.php";


class ModelTask extends connect {
    public function insertTask($title, $description) {
        $query = "INSERT INTO Tasks (title, description) VALUES (?, ?)";
        return $this->execute($query, [$title, $description]);
    }
    // public function assignTask($email) {
    //     $query = "INSERT INTO Tasks (title, description) VALUES (?, ?)";
    //     return $this->execute($query, [$title, $description]);
    // }
    public function getTasks($email) {
        $result = $this->fetch(SQL_TASKS, [$email], false);
        if ($result) {
            return $result;
        }else {
            return [];
        }
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