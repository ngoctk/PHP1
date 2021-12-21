<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
header("location: danh-sach.php"); // điều hướng trình duyệt sang 1 url khác