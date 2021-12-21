<?php
// tạo kết nối
require_once '../common/db.php';
$id = $_GET['id'];
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$email = $_POST['email'];
$file = $_FILES['avatar'];
$role = $_POST['role'];


$sql = "select * from users where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

if ($name == '') {
        $nameErr = 'Hãy nhập tên người dùng';
}



if ($email == '') {
        $emailErr = 'Hãy nhập email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Yêu cầu nhập đúng dạng email";
}

if ($role == '') {
        $roleErr = 'Hãy nhập chức vụ';
}



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

if ($nameErr .  $emailErr . $fileErr . $roleErr != "") {
        header("location: edit-form.php?id=$id&nameerr=$nameErr&emailerr=$emailErr&fileerr=$fileErr&roleerr=$roleErr");
        die;
}

$sql = "update users
        set     name = '$name', 
                email = '$email',
                avatar = '$path',
                role = $role
        where id = $id";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");
