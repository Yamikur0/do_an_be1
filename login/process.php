<?php
require_once '../config/database.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});
$usermodel = new UserModel();
$result = '';
if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    if (!$usermodel->checkUsername($username)) {
        echo 'taken';
    }else{
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$usermodel->createUser($username,$password)) {
        echo 'error';
        exit();
    }else{
        echo 'Saved!';
        exit();
    }
}
?>
