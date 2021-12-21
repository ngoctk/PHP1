<?php
require_once '../common/db.php';
$id = $_GET['id'];
$sql = "select * from users where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3>Đổi mật khẩu</h3>
        <form action="post-change.php?id=<?= $id ?>" method="post">
            <div class="row">
                <div class="col">
                    <label for="">Tên tài khoản</label>
                    <input type="text" class="form-control" disabled value="<?= $product['name'] ?>">
                </div>
                <div class="col">
                    <label for="">Mật khẩu hiện tại</label>
                    <input type="password" class="form-control" name="old_password">
                    <?php if (isset($_GET['msg'])) : ?>
                    <span class="text-danger" style="color:red;"><?= $_GET['msg'] ?></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="password">
                    <?php if (isset($_GET['passworderr'])) : ?>
                    <span class="text-danger" style="color:red;"><?= $_GET['passworderr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" name="cfpassword">
                    <?php if (isset($_GET['cfpassworderr'])) : ?>
                    <span class="text-danger" style="color:red;"><?= $_GET['cfpassworderr'] ?></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info mt-4">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
</body>

</html>