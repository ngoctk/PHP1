<?php
require_once '../common/db.php';
$id = $_GET['id'];
$sql = "delete from employees where id = $id";

$statement = $connect->prepare($sql);
$statement->execute();
header("location: index.php"); // điều hướng trình duyệt sang 1 url khác