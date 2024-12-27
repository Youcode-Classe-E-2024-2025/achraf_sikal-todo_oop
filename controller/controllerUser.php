<?php

include("../model/user.php");

class UserController {
    private $auth;

    public function __construct() {
        $this->auth = new Auth();
    }

    public function signUp($firstname, $lastname, $email, $password) {
        return $this->auth->insertUser($firstname, $lastname, $email, $password);
    }

    public function login($email, $password) {
        $user = $this->auth->getUserByEmail($email);

        if ($user) {
            // Debugging output
            // echo "Password from DB: " . $user['password'] . "<br>";
            // echo "Password entered: " . $password . "<br>";

            // Verify the entered password against the stored hashed password
            if (password_verify($password, $user['password'])) {
                echo "Password is correct!<br>";
                return $user;
            } else {
                echo "Password is incorrect!<br>";
                return false;
            }
        } else {
            echo "User not found!<br>";
            return false;
        }
    }

    public function handleRequest() {
        if (isset($_GET['action']) && $_GET['action'] == 'signup' && $_SERVER["REQUEST_METHOD"] == "POST") {
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->signUp($firstname, $lastname, $email, $password);
            if ($result) {
                header("Location: ../views/login/login.html");
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }

        if (isset($_GET['action']) && $_GET['action'] == 'login' && $_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // // Debugging output
            // echo "Email: " . $email . "<br>";
            // echo "Password: " . $password . "<br>";

            $result = $this->login($email, $password);
            if ($result) {
                if($result['role'] == "User"){
                    header('Location: ../views/layouts/user.php');
                }else{
                    header('Location: ../views/layouts/admin.php');
                }
                // echo "Connexion réussie. Bienvenue, " . $result['firstname'] . "!";
            } else {
                echo "Erreur lors de la connexion. Vérifiez vos identifiants.";
            }
        }
    }
}

$controller = new UserController();
$controller->handleRequest();
?>
