<?php
require_once './db.php';
$id = $_GET['id'];
$sql = "select * from employees where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();
// echo "<pre>";
// var_dump($product);
// die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="save-edit.php?id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="<?= $product['name'] ?>">
        </div>
        <div>
            <label for="">Birth_date</label>
            <input type="date" name="birth_date" value="<?= $product['birth_date'] ?>">
        </div>
        <div>
            <label for="">Salary</label>
            <input type="number" name="salary" value="<?= $product['salary'] ?>">
        </div>
        <div class="">
            <label for="">Avatar</label><br>
            <img src="<?= $product['avatar'] ?>" alt="" width="170">
        </div>
        <div>
            <label for="">avatar</label>
            <input type="file" name="avatar">
        </div>
        <div class="">
            <label for="">Identity_card_number</label>
            <input type="text" name="card" class="card" value="<?= $product['identity_card_number'] ?>">
        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>