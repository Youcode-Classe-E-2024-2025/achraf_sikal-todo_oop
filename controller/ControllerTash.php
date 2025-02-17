<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ ."/../model/task.php";

class TaskController {
    private $model;

    public function __construct() {
        $this->model = new ModelTask();
    }

    public function handleRequest() {
        if (isset($_GET['action']) && $_GET['action'] == 'insert' && $_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $email = $_POST['email'];
            $result = $this->insertTask($title, $description, $email);
            if ($result) {
                header("Location: ../views/layouts/admin.php");
                exit();
            } else {
                echo "Error inserting task.";
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && $_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $type = $_POST['type'];
            $status = $_POST['status'];
            $id = (int) $_POST['id'];
            $result = $this->ediTask($name, $description, $type, $status,$id);
            if ($result) {
                header("Location: ../views/layouts/user.php");
                exit();
            } else {
                echo "Error inserting task.";
            }
        }
        if (isset($_GET['action']) && $_GET['action'] == 'view') {
            $tasks = $this->viewTasks();
            echo "<pre>";
            print_r($tasks);
            echo "</pre>";
        }
    }

    public function insertTask($title, $description, $email) {
        return $this->model->insertTask($title, $description, $email);
    }
    public function ediTask($name, $description, $type, $status, $id) {
        return $this->model->editTask($name, $description, $type, $status, $id);
    }
    public function deleteTask($taskId) { 
        return $this->model->deleteTask($taskId); 
    }
    public function viewTasks() {
        if (isset($_SESSION["user"])) {
            return $this->model->getTasks($_SESSION["user"]);
        }
    }
}

// Create an instance of TaskController and handle the request
$controller = new TaskController();
$controller->handleRequest();
?>
