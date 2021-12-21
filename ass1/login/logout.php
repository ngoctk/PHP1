<?php
session_start();
unset($_SESSION['auth']);
header('location: ../employees/index.php');