<?
session_start();

include("../classes/Database.php");
include_once __DIR__ . "/../config/config.php";

class listTask extends connect{
    public function getTasks($email) {
        return $this->fetch(SQL_TASKS, [$email], false);
    }
}