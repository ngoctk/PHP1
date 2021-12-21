<?php
require_once '../common/db.php';
$id = $_GET['id'];
$sqlEm = "delete from employees where company_id = $id";

$sql = "delete from companies where id = $id";
$statement = $connect->prepare($sqlEm);
$statement->execute();
$statement = $connect->prepare($sql);
$statement->execute();
header("location: index.php"); // điều hướng trình duyệt sang 1 url khác