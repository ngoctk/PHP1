<?php
// tạo kết nối
require_once './db.php';
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$salary = $_POST['salary'];
$file = $_FILES['avatar'];
$card = $_POST['card'];
// echo "<pre>";
// var_dump($file);
// die;
$filename = "";
if ($file['size'] > 0) {
    $filename = uniqid() . '-' . $file['name'];
    move_uploaded_file($file['tmp_name'], 'uploads/' . $filename);
    $filename = 'uploads/' . $filename;
}

$sql = "insert into employees
            (name, birth_date, salary, avatar, identity_card_number)
        values 
            ('$name', '$birth_date', '$salary', '$filename',$card)";
var_dump($sql);
$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");
