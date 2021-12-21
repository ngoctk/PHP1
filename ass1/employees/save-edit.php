<?php
// tạo kết nối
require_once '../common/db.php';
$id = $_GET['id'];
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$company_id = $_POST['company_id'];
$birth_date = $_POST['birth_date'];
$salary = $_POST['salary'];
$file = $_FILES['avatar'];
$card = $_POST['card'];

if ($name == '') {
        $nameErr = 'Hãy nhập tên nhân viên';
}

if ($birth_date == '') {
        $birth_dateErr = 'Hãy nhập ngày sinh';
}

if ($salary == '') {
        $salaryErr = 'Hãy nhập lương';
}elseif($salary<1){
        $salaryErr = 'Lương phải lớn hơn 0';
    }

if ($card == '') {
        $cardErr = 'Hãy nhập số thẻ';
}

$sql = "select * from employees where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

$path = "";
if ($file['size'] > 0) {
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], '../uploads/' . $filename);
        $path = 'uploads/' . $filename;
} elseif ($file['size'] > 1500000) {
        $fileErr = "Hình ảnh phải nhỏ hơn 1.5mb";
} else {
        $path = $product['avatar'];
}

if($nameErr.$birth_dateErr.$salaryErr.$fileErr.$cardErr != ""){
        header("location: edit-form.php?id=$id&nameerr=$nameErr&birth_dateerr=$birth_dateErr&salaryerr=$salaryErr&fileerr=$fileErr&carderr=$cardErr");
        die;
    }

$sql = "update employees
        set     name = '$name', 
                birth_date = '$birth_date', 
                salary = $salary,
                avatar = '$path',
                identity_card_number = $card,
                company_id = $company_id
        where id = $id";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");
