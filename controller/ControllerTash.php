<?php
session_start();
include __DIR__ ."/../model/task.php";

class TaskController {
    private $model;

    public function __construct() {
        $this->model = new ModelTask();
    }

    public function handleRequest() {
        if (isset($_GET['action']) && $_GET['action'] == 'insert' && $_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $result = $this->insertTask($title, $description);
            if ($result) {
                header("Location: ../views/layouts/admin.php");
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

    public function insertTask($title, $description) {
        return $this->model->insertTask($title, $description);
    }

    public function viewTasks() {
        return $this->model->getTasks($_SESSION["user"]);
    }
}

// Create an instance of TaskController and handle the request
$controller = new TaskController();
$controller->handleRequest();
?>
