<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once './database/database.php';

    $id = $_GET['id'];

    deleteStudent($id);

    header('location: index.php');
}
?>