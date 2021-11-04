<?php
$name = $_GET['name'];
$gender = $_GET['gender'];
$birthdate =$_GET['birthdate'];
$_age = floor((time() - strtotime($birthdate)) / 31556926);
if($gender == 0 && $_age >= 20){
    echo $name." chúc mừng bạn đã đủ tuổi kết hôn";
}elseif($gender == 1 && $_age >= 18){
    echo $name." chúc mừng bạn đã đủ tuổi kết hôn";
}else{
    echo $name." không đủ tuổi kết hôn";
}
?>