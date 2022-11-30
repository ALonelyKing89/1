<?php
$server = 'localhost'; // Имя или адрес сервера
$user = 'root'; // Имя пользователя БД
$password = 'root'; // Пароль пользователя
$db = 'hakaton2022'; // Название БД

$db = mysqli_connect($server, $user, $password, $db); // Подключение

// Проверка на подключение

if (!$db) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    die("База данных не поключена: " . mysqli_connect_error());
}

?>
<!-- Подключение бутстрапа 123 -->

<link rel="stylesheet" href="style/css/bootstrap.min.css">
<script src="style/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

