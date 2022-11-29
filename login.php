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

<body>

    <main class="form-signin w-100 m-auto">
        <form class="container">
            <img class="mx-auto my-4 d-flex col-1" src="logo.png">
            <h1 class="h3 my-5 fw-normal text-center">Авторизация</h1>

            <div class="form-floating col-4 my-4 mx-auto">
                <input  type="email" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label class="text-center"  for="floatingInput">login</label>
            </div>
            <div class="form-floating col-4 my-4 mx-auto">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="pass">
                <label  for="floatingPassword">password</label>
            </div>

            <button class=" btn btn-lg btn-primary my-4 col-4 mx-auto d-flex" type="submit">Войти</button>
        </form>
    </main>

</body>

</html>