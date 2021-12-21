<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

require_once 'data.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body">
        <?php require_once('../common/navbar.php') ?>
            <div class="row">
                <h1>Giỏ hàng</h1>
                <table class="table table-secondary table-striped mt-2">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $key => $value) : ?>
                        <tr>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td>
                                <img src="<?= $value['image'] ?>" width="120">
                            </td>
                            <td><?= $value['price'] ?></td>
                            <td><?= $value['quantity'] ?></td>
                            <td><a href="remove.php?id=<?= $key?>">Xóa</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>


                <h1>Sản phẩm</h1>
                <table class="table table-secondary table-striped mt-2">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>image</th>
                        <th>price</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $value) : ?>
                        <tr>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td>
                                <img src="<?= $value['image'] ?>" width="120">
                            </td>
                            <td><?= $value['price'] ?></td>
                            <td>
                                <a href="add-to-cart.php?id=<?= $value['id'] ?>">Add</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>