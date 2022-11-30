<?php
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';

//запрашиваем данные из таблицы users
$l = $db->query('SELECT * FROM users');
$dalsh = 0;

// Очистка сессии если пользователь нажал выйти
session_unset();

//----------РАБОТА С ФОРМОЙ
// Проверяем нажата ли кнопка отправки формы
if (isset($_POST["doGo"])) {
    // Проверяем наличие пользователя с переданными данными
    foreach ($l as $log) {
        if (($log["login"] == $_POST["login"]) && ($_POST["pass"] == $log["password"])) {
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["pass"] = $_POST["pass"];
            $dalsh = 1;
            $_SESSION['adm'] = 0;
            $idUser = htmlspecialchars($log["id_user"]);
            //переадресуем пользователя
            header('Location:Ucabinet.php');
        }
        if (($log["login"] == "admin") && ($_POST["pass"] == "admin") ) {
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["pass"] = $_POST["pass"];
            $_SESSION["adm"] = $log['admin'];
            $dalsh = 1;
            $_SESSION['adm'] = 1;
            header('Location:Acabinet.php');
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

<body>
<?
include("template\header.php"); 
?>
    <main class="form-signin w-100 m-auto">
        <form class="container" method="post">
            <h1 class="h3 my-5 fw-normal text-center">Авторизация</h1>

            <div class="form-floating col-3 my-4 mx-auto">
                <input  type="text" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label  for="floatingInput">login</label>
            </div>
            <div class="form-floating col-3 my-4 mx-auto">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="pass">
                <label  for="floatingPassword">password</label>
            </div>

            <button class="text-center btn btn-lg btn-primary my-4 mx-auto d-flex" name="doGo" type="submit">Войти</button>
        </form>
    </main>
<?

include("template\\footer.php");
?>
</body>

</html>