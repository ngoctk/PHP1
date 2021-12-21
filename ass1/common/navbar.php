<ul class="nav justify-content-end">
    <?php
    $auth = isset($_SESSION['auth']) ? $_SESSION['auth'] : '';
    if ($auth !== '') : ?>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../login/logout.php">Logout</a>
    </li>
    <?php else : ?>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../login/login.php">login</a>
    </li>
    <?php endif ?>
    <li class="nav-item">
        <a class="nav-link" href="../companies/index.php">Company</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../employees/index.php">Employe</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../users/index.php">User</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../gio-hang/danh-sach.php">Giỏ hàng</a>
    </li>
</ul>