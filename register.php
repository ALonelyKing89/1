<?php
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';
$l = $db->query('SELECT * FROM users');


// Очистка сессии если пользователь нажал выйти
session_unset();

//----------РАБОТА С ФОРМОЙ
// Проверяем нажата ли кнопка отправки формы
if (isset($_POST["doGo"])) {
    $haveUser = 0;
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['pass']);
    foreach ($l as $log) {
        if (($log["login"] == $login)) {
            echo "<script>alert('Такой пользователь уже зарегистрирован!');</script>";
            $haveUser = 1;
            break;
        }
    }
    if ($haveUser == 0) {
            // вносим пользователя в базу данных
            $sql = "INSERT INTO users (`login`, `password`) VALUES ('$login', '$password')";

            if ($db->query($sql) === TRUE) {
                echo "<script>alert('Данные отправлены!');</script>";
            } else {
                echo "<script>alert('Ошибка отправки данных!');</script>";
            }
        }
}

?>


<html>

<head>
    <title>Регистрация</title>
</head>

<body>

    <main class="form-signin w-100 m-auto">
        <form class="container"  method="post">
            <h1 class="h3 my-5 fw-normal text-center">Регистрация</h1>

            <div class="form-floating col-3 my-4 mx-auto">
                <input type="text" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label for="floatingInput">login</label>
            </div>
            <div class="form-floating col-3 my-4 mx-auto">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="pass">
                <label for="floatingPassword">password</label>
            </div>

            <button class="text-center btn btn-lg btn-primary my-4 mx-auto d-flex" name="doGo" type="submit">Зарегистрироваться</button>
        </form>
    </main>

</body>

</html>