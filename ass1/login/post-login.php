<?php
session_start();
require_once '../common/db.php';
// nhận dữ liệu từ form
$email = $_POST['email'];
$password = $_POST['password'];
// chuẩn bị sẵn 1 câu lệnh sql để lấy user dựa vào email nhận đc từ form
$getUserByEmail = "select * from users where email = '$email'";
$stmt = $connect->prepare($getUserByEmail);
// thực thi câu lệnh sql với csdl
$stmt->execute();
// nhận dữ liệu trả về từ csdl
$user = $stmt->fetch();
// nếu có user và mk trong csdl khớp với mk người dùng điền vào => tạo phần tử auth của biến
// session và điều hướng website về trang a.php
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['auth'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role'],
    ];
    header('location: ../employees/index.php');
    die;
}
// không thỏa mãn thì điều hướng ngược về trang login với 1 message
header("location: login.php?msg=Đăng nhập không thành công!");