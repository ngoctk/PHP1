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
<form class="row" action="save-add.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <label for="">name</label>
                <input class="form-control" type="text" name="name">
                <?php if (isset($_GET['nameerr'])) : ?>
                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                <?php endif ?>
            </div>
            <div class="col">
                <label for="">logo</label>
                <input class="form-control" type="file" name="logo">
                <?php if (isset($_GET['logoerr'])) : ?>
                    <span class="text-danger"><?= $_GET['logoerr'] ?></span>
                <?php endif ?>
            </div>
            
        </div>
        <div class="row">
        <div class="col">
                <label for="">address</label>
                <input class="form-control" type="text" name="address">
                <?php if (isset($_GET['addresserr'])) : ?>
                    <span class="text-danger"><?= $_GET['addresserr'] ?></span>
                <?php endif ?>
            </div>
            <div class="col">
                <button class="btn btn-info mt-4" type="submit">Lưu</button>
            </div>
        </div>
    </form>
</div>
</body>

</html>