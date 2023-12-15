<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once './database/database.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    updateStudent($id, $name, $profile, $email, $age);
    header('location: index.php');
}
