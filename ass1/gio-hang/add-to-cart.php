<?php
session_start();
$id = $_GET['id'];
require_once 'data.php';
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$sp = [];
foreach ($products as $key => $value) {
    if ($value['id'] == $id) {
        $sp = $value;
        break;
    }
}

// kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa

$pro = -1;
foreach ($cart as $key => $proCart) {
    if ($proCart['id'] == $id) {
        $pro = $key;
        break;
    }
}
// nếu chưa có thì bổ sung thêm quantity sau đó add sản phẩm vào giỏ hàng
if ($pro == -1) {
    $sp['quantity'] = 1;
    $cart[] = $sp;
} else {
    // nếu có rồi thì tìm ra index của sản phẩm đã tồn tại trong giỏ hàng 
    // sau đó tăng giá trị của quantity lên 1 đơn vị
    $cart[$pro]['quantity']++;
}

$_SESSION['cart'] = $cart;

header('location: danh-sach.php');