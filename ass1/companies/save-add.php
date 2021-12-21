<?php
// tạo kết nối
require_once '../common/db.php';
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$logo = $_FILES['logo'];
$logoErr = '';
$address = $_POST['address'];

if($name==''){
    $nameErr = 'Hãy nhập tên công ty';
}

if($address==''){
    $addressErr = 'Hãy nhập địa chỉ công ty';
}

$filename = "";
if ($logo['size'] > 0) {
    $filename = uniqid() . '-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], '../uploads/' . $filename);
    $filename = 'uploads/' . $filename;
}elseif($logo['size'] == 0){
    $logoErr = "Hãy upload ảnh";
}elseif($logo['size']>1500000){
    $logoErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}

if($nameErr.$addressErr.$logoErr != ""){
    header("location: add-form.php?nameerr=$nameErr&logoerr=$logoErr&addresserr=$addressErr");
    die;
}

$sql = "insert into companies
            (name, logo, address)
        values 
            ('$name', '$filename','$address')";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");