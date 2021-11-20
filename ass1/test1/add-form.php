<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="save-add.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Birth_date</label>
            <input type="date" name="birth_date">
        </div>
        <div>
            <label for="">Salary</label>
            <input type="number" name="salary">
        </div>
        <div>
            <label for="">avatar</label>
            <input type="file" name="avatar">
        </div>
        <div class="">
            <label for="">Identity_card_number</label>
            <input type="text" class="card" name="card">
        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>