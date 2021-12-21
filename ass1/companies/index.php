<?php
session_start();
// tạo kết nối
require_once '../common/db.php';
// tạo câu lệnh sql
$sql = "select * from companies";

$error = "";
$name = isset($_GET['name']) ? $_GET['name'] : '';
$alphas = isset($_GET['alpha']) ? $_GET['alpha'] : '';

if ($name !== "" && $alphas !== "") {
    if ($alphas !== "") {
        $sql .= " where name like '%$name%' order by name $alphas";
    } else {
        $sql .= " where name like '%$name%'";
    }
}


if ($name == "" && $alphas !== "") {
    $sql .= " order by name $alphas";
}

$statement = $connect->prepare($sql);
// thực thi câu sql với db
$statement->execute();
// thu lại kết quả trả về từ csdl
$products = $statement->fetchAll();

if (empty($products)) {
    $error .= "Không tìm thấy kết quả";
}
// fetch: lấy 1 bản ghi đầu tiên thỏa mãn câu lệnh ssql
// echo "<pre>";
// var_dump($products);
// dựa vào mảng products hiển thị ra 1 table danh sách các sản phẩm 

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
            <div class="row">
                <?php require_once('../common/navbar.php') ?>
                <form action="" method="get" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Lọc theo alpha</label>
                            <select name="alpha" id="" class="form-control">
                                <option value="">Chọn đê</option>
                                <?php foreach ($alpha as $a) : ?>
                                <option <?php if ($a['order'] == $alphas) : ?> selected <?php endif ?>
                                    value="<?= $a['order'] ?>"><?= $a['filter'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Tìm kiếm</label>
                            <input type="text" name="name" value="<?= $name ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary mt-2" type="submit">Search</button>
                    </div>
                </form>
                <table class="table table-secondary table-striped mt-2">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Address</th>
                        <th>
                        <?php
                            if (isset($_SESSION['auth'])&& $_SESSION['auth']['role'] > 0) : ?>
                            <a href="add-form.php" class="btn btn-success">Tạo mới</a>
                            <?php endif ?>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        if ($error !== "") : ?>
                        <tr>
                            <td class="empty"><?= $error ?></td>
                        </tr>
                        <?php endif ?>
                        <?php foreach ($products as $key => $value) : ?>
                        <tr>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td>
                                <img src="../<?= $value['logo'] ?>" width="100">
                            </td>
                            <td><?= $value['address'] ?></td>
                            <td>
                                <?php
                                    if (isset($_SESSION['auth'])&& $_SESSION['auth']['role'] > 0) : ?>
                                <a href="edit-form.php?id=<?= $value['id'] ?>" class="btn btn-info">Sửa</a>
                                <a href="remove.php?id=<?= $value['id'] ?>" class="btn btn-danger">Xóa</a>
                                <?php endif ?>
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