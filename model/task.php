<?php

include __DIR__ ."/../classes/Database.php";
include_once __DIR__ . "/../config/config.php";


class ModelTask extends connect {
    public function insertTask($title, $description, $email) {
        $this->db->beginTransaction();
        $query = "INSERT INTO Tasks (title, description) VALUES (?, ?)";
        $this->execute($query, [$title, $description]);
        $taskId = $this->db->lastInsertId();
        $user = $this->fetch("SELECT user_id FROM users WHERE email = ?;", [$email]);
        $userId = $user[0]["user_id"];
        $this->execute("INSERT INTO usertasks (user_id, task_id) VALUES (?, ?)", [$userId, $taskId]);
        $this->db->commit();
        return true;
    }
    // public function inseask($title, $description, $email) {
    //     try {
    //         $this->db->beginTransaction();
            
    //         // Check if user exists
    //         $stmt = $this->exec("SELECT id FROM users WHERE email = ?", [$email]);
    //         $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //         if (!$user) {
    //             throw new Exception("User with email $email not found!");
    //         }
    //         $userId = $user['id'];
    //         var_dump($userId);

    //         // Insert task
    //         $stmt = $this->exec("INSERT INTO tasks (title, description) VALUES (?, ?)", [$title, $description]);

    //         // Assign task to user
    //         $this->exec("INSERT INTO user_task (user_id, task_id) VALUES (?, ?)", [$userId, $taskId]);

    //         $this->db->commit();
    //         return "Task '$title' assigned to $email successfully!";
    //     } catch (Exception $e) {
    //         $this->db->rollBack();
    //         return "Failed to create task: " . $e->getMessage();
    //     }
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