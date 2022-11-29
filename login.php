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
        <form>
            <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
        </form>
    </main>

</body>

</html>