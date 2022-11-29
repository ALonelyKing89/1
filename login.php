<?php
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';

//запрашиваем данные из таблицы users
$l = $db->query('SELECT * FROM user');
$dalsh = 0;

// Очистка сессии если пользователь нажал выйти
session_unset();

//----------РАБОТА С ФОРМОЙ
// Проверяем нажата ли кнопка отправки формы
if (isset($_POST["doGo"])) {
    // Проверяем наличие пользователя с переданными данными
    foreach ($l as $log) {
        if (($log["login"] == $_POST["login"]) && ($_POST["pass"] == $log["password"]) && ($log['admin'] != 1)) {
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["pass"] = $_POST["pass"];
            $dalsh = 1;
            //переадресуем пользователя
            header('Location:index.php');
        }
        if (($log["login"] == $_POST["login"]) && ($_POST["pass"] == $log["password"]) && ($log['admin'] == 1)) {
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["pass"] = $_POST["pass"];
            $_SESSION["adm"] = $log['admin'];
            $dalsh = 1;
            header('Location:equipment.php');
        }
    }

    if ($dalsh == 0) {
?>
        <script>
            alert("ОШИБКА: Пользователь не найден");
        </script>
<? };
};
?>


<html>

<head>
    <title>Авторизация</title>
</head>

<body style="background-color:#BBE2F5;">

    <div class="container col-md-10 col-sm-12 col-lg-6 border-0 mt-5">
        <div class="card">
            <div class="card-header border-0">
                <p class="h1 text-center my-4 fw-bold">Авторизация</p>
            </div>
            <form class="p-5" id="form" enctype="multipart/form-data" method="POST">
                <input type="text" class="form-control" placeholder="Логин" name="login">
                <input type="password" class="form-control mt-1" placeholder="Пароль" name="pass">
                <input class="btn btn-primary container mt-2 border-0 fw-bold" type="submit" value="ОТПРАВИТЬ" name="doGo" style="background-color: #36c0f1;">
            </form>
        </div>
    </div>

</body>

</html>