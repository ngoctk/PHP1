<?php

$connect = new PDO("mysql:host=127.0.0.1;dbname=ass1;charset=utf8", "root", "");

$alpha = [
    [
        'filter' => 'Lọc theo thứ tự tăng dần',
        'order' => 'asc'
    ],
    [
        'filter' => 'Lọc theo thứ tự giảm dần',
        'order' => 'desc'
    ]
];