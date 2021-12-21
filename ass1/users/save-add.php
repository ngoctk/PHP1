<?php
// tạo kết nối
require_once '../common/db.php';
// nhận dữ liệu từ form gửi lên
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$file = $_FILES['avatar'];
$role = $_POST['role'];

if($name==''){
    $nameErr = 'Hãy nhập tên người dùng';
}

if($password==''){
    $passwordErr = 'Hãy nhập mật khẩu';
}
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password) < 6 || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn ";
}
// giống với xác nhận mk
if($password != $cfpassword){
    $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
}

if($email==''){
    $emailErr = 'Hãy nhập email';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Yêu cầu nhập đúng dạng email";
}

if($role==''){
    $roleErr = 'Hãy nhập chức vụ';
}

$filename = "";
if ($file['size'] > 0) {
    $filename = uniqid() . '-' . $file['name'];
    move_uploaded_file($file['tmp_name'], '../uploads/' . $filename);
    $filename = 'uploads/' . $filename;
}elseif($file['size'] == 0){
    $fileErr = "Hãy upload ảnh";
}elseif($file['size']>1500000){
    $fileErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}

if($nameErr.$passwordErr.$cfpasswordErr.$emailErr.$fileErr.$roleErr != ""){
    header("location: add-form.php?nameerr=$nameErr&passworderr=$passwordErr&cfpassworderr=$cfpasswordErr&emailerr=$emailErr&fileerr=$fileErr&roleerr=$roleErr");
    die;
}

$hashPassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into users
            (name, email, password, avatar, role)
        values 
            ('$name', '$email', '$hashPassword', '$filename',$role)";

$stmt = $connect->prepare($sql);
$stmt->execute();
header("location: index.php");