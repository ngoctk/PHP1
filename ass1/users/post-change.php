<?php
// tạo kết nối
session_start();
require_once '../common/db.php';
$id = $_GET['id'];
// nhận dữ liệu từ form gửi lên
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$passwordErr = "";
$cfpassword = $_POST['cfpassword'];
$cfpasswordErr = "";

$removeWhiteSpacePassword = str_replace(" ", "", $password);
if ((strlen($removeWhiteSpacePassword) != strlen($password))) {
    $passwordErr = "Mật khẩu không thỏa mãn ";
}
if (strlen($password) < 6) {
    $passwordErr = "Mật khẩu phải nhiều hơn 6 kí tự ";
}
// giống với xác nhận mk
if ($password != $cfpassword) {
    $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
}

if ($passwordErr . $cfpasswordErr != "") {
    header("location: change-pass.php?id=$id&passworderr=$passwordErr&cfpassworderr=$cfpasswordErr");
    die;
}

$sql = "select * from users where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

if (!password_verify($old_password, $product['password'])) {
    header("location: change-pass.php?id=$id&msg=Mật khẩu cũ không đúng");
    die;
}

$path = "";
if ($file['size'] > 0) {
    $filename = uniqid() . '-' . $file['name'];
    move_uploaded_file($file['tmp_name'], '../uploads/' . $filename);
    $path = 'uploads/' . $filename;
} else {
    $path = $product['avatar'];
}

// mã hóa mk mới
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "update users
        set     password = '$passwordHash'
        where id = $id";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");