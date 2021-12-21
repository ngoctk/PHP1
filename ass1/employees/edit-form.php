<?php
require_once '../common/db.php';
$id = $_GET['id'];
$sql = "select * from employees where id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();
// echo "<pre>";
// var_dump($product);
// die;
$sql = "select * from companies";
$stmt = $connect->prepare($sql);
$stmt->execute();
$company = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <form action="save-edit.php?id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" value="<?= $product['name'] ?>">
                    <?php if (isset($_GET['nameerr'])) : ?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">Birth_date</label>
                    <input class="form-control" type="date" name="birth_date" value="<?= $product['birth_date'] ?>">
                    <?php if (isset($_GET['birth_dateerr'])) : ?>
                        <span class="text-danger"><?= $_GET['birth_dateerr'] ?></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Salary</label>
                    <input class="form-control" type="number" name="salary" value="<?= $product['salary'] ?>">
                    <?php if (isset($_GET['salaryerr'])) : ?>
                        <span class="text-danger"><?= $_GET['salaryerr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">Avatar</label><br>
                    <img src="../<?= $product['avatar'] ?>" alt="" width="170">
                </div>
            </div>
            <div class="col">
                <label for="">avatar</label>
                <input class="form-control" type="file" name="avatar">
                <?php if (isset($_GET['fileerr'])) : ?>
                    <span class="text-danger"><?= $_GET['fileerr'] ?></span>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Identity_card_number</label>
                    <input class="form-control" type="text" class="card" name="card">
                    <?php if (isset($_GET['carderr'])) : ?>
                        <span class="text-danger"><?= $_GET['carderr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">Company</label>
                    <select class="form-control" name="company_id">
                        <?php foreach ($company as $c) : ?>
                            <option <?php if ($c['id'] == $product['company_id']) : ?> selected <?php endif ?> value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                        <?php endforeach ?>
                        <?php if (isset($_GET['company_iderr'])) : ?>
                            <span class="text-danger"><?= $_GET['company_iderr'] ?></span>
                        <?php endif ?>
                    </select>
                </div>
            </div>
            <div class="text-center mt-2">
                <button class="btn btn-info" type="submit">Lưu</button>
            </div>
        </form>
    </div>
</body>

</html>