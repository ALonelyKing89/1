<?php
$server = 'localhost'; // Имя или адрес сервера
$user = 'root'; // Имя пользователя БД
$password = ''; // Пароль пользователя
$db = 'hakaton2022'; // Название БД

$db = mysqli_connect($server, $user, $password, $db); // Подключение

// Проверка на подключение

if (!$db) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    die("База данных не поключена: " . mysqli_connect_error());
}

?>
<!-- Подключение бутстрапа -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
