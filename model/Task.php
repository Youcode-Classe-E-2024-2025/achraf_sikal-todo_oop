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
    public function editTask($name, $description, $type, $status,$id) {
        $this->db->beginTransaction();
        $query = "UPDATE tasks SET title = ?, description = ?, status = ?, task_type = ? WHERE task_id = ?;";
        return $this->execute($query, [$name, $description, $status, $type, $id]);
    }
    public function getTasks($email) {
        // $this->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->fetch(SQL_TASKS, [$email], false);
        if ($result) {
            return $result;
        }else {
            return [];
        }
    }


    public function deleteTask($taskId) {
        $this->db->beginTransaction();
        $this->execute("DELETE FROM usertasks WHERE task_id = ?", [$taskId]);
        $this->execute("DELETE FROM tasks WHERE task_id = ?", [$taskId]);
        $this->db->commit();
        return true;
    }
    
}