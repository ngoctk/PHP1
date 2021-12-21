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
        <form action="save-add.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="">name</label>
                    <input class="form-control" type="text" name="name">
                    <?php if (isset($_GET['nameerr'])) : ?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">email</label>
                    <input class="form-control" type="text" name="email">
                    <?php if (isset($_GET['emailerr'])) : ?>
                        <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                    <?php endif ?>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <label for="">password</label>
                    <input class="form-control" type="password" name="password">
                    <?php if (isset($_GET['passworderr'])) : ?>
                        <span class="text-danger"><?= $_GET['passworderr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">Confirm password</label>
                    <input type="password" name="cfpassword" class="form-control">
                    <?php if (isset($_GET['cfpassworderr'])) : ?>
                        <span class="text-danger"><?= $_GET['cfpassworderr'] ?></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">avatar</label>
                    <input class="form-control" type="file" name="avatar">
                    <?php if (isset($_GET['fileerr'])) : ?>
                        <span class="text-danger"><?= $_GET['fileerr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="col">
                    <label for="">role</label>
                    <input class="form-control" type="number" name="role">
                    <?php if (isset($_GET['roleerr'])) : ?>
                        <span class="text-danger"><?= $_GET['roleerr'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-info mt-4" type="submit">Lưu</button>

            </div>
        </form>
    </div>
</body>

</html>