<?php
// tạo kết nối
require_once '../common/db.php';
$id = $_GET['id'];
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$logo = $_FILES['logo'];
$address = $_POST['address'];

if ($name == '') {
        $nameErr = 'Hãy nhập tên công ty';
}

if ($address == '') {
        $addressErr = 'Hãy nhập địa chỉ công ty';
}


$sql = "select * from companies where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

$path = "";
if ($logo['size'] > 0) {
        $filename = uniqid() . '-' . $logo['name'];
        move_uploaded_file($logo['tmp_name'], '../uploads/' . $filename);
        $path = 'uploads/' . $filename;
} elseif ($logo['size'] > 1500000) {
        $logoErr = "Hình ảnh phải nhỏ hơn 1.5mb";
} else {
        $path = $product['logo'];
}
if($nameErr.$addressErr.$logoErr != ""){
        header("location: edit-form.php?id=$id&nameerr=$nameErr&logoerr=$logoErr&addresserr=$addressErr");
        die;
    }

$sql = "update companies
        set     name = '$name', 
                logo = '$path',
                address = '$address'
        where id = $id";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");
