<?php
// tạo kết nối
require_once './db.php';
$id = $_GET['id'];
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$salary = $_POST['salary'];
$file = $_FILES['avatar'];
$card = $_POST['card'];

$sql = "select * from employees where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

$path = "";
if ($file['size'] > 0) {
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], 'uploads/' . $filename);
        $path = 'uploads/' . $filename;
} else {
        $path = $product['avatar'];
}

$sql = "update employees
        set     name = '$name', 
                birth_date = '$birth_date', 
                salary = $salary,
                avatar = '$path',
                identity_card_number = $card
        where id = $id";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");