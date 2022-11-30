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
    $repass = htmlspecialchars($_POST['repass']);
    $haveUser = 0;
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['pass']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    if ($repass == $password) {
        foreach ($l as $log) {
            if (($log["login"] == $login)) {
                echo "<script>alert('Такой пользователь уже зарегистрирован!');</script>";
                $haveUser = 1;
                break;
            }
        }
        if ($haveUser == 0) {
            // вносим пользователя в базу данных
            $sql = "INSERT INTO users (`login`, `password`,`name_user`,`email`) VALUES ('$login', '$password','$name','$email')";

            if ($db->query($sql) === TRUE) {
                echo "<script>alert('Данные отправлены!');</script>";
            } else {
                echo "<script>alert('Ошибка отправки данных!');</script>";
            }
        }
    } else {
        echo "<script>alert('Пароли не совпадают!');</script>";
    }
}

?>


<html>

<head>
    <title>Регистрация</title>
</head>

<body>
    <?
include("template\header.php"); 
?>
    <main class="form-signin w-100 m-auto">
        <form class="container" method="post">
            <h1 class="h3 my-5 fw-normal text-center">Регистрация</h1>

            <div class="form-floating col-3 my-4 mx-auto">
                <input pattern="^[А-Яа-яЁё\s-]+$" required type="text" class="form-control" id="floatingInput" placeholder="login" name="name">
                <label for="floatingInput">ФИО</label>
            </div>

            <div class="form-floating col-3 my-4 mx-auto">
                <input required type="text" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label for="floatingInput">Логин</label>
            </div>

            <div class="form-floating col-3 my-4 mx-auto">
                <input required type="email" class="form-control" id="floatingInput" placeholder="login" name="email">
                <label for="floatingInput">Email</label>
            </div>


            <div class="form-floating col-3 my-4 mx-auto">
                <input required type="password" class="form-control" id="floatingPassword" placeholder="password" name="pass">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="form-floating col-3 my-4 mx-auto">
                <input required type="password" class="form-control" id="floatingPassword" placeholder="password" name="repass">
                <label for="floatingPassword">Повтор пароля</label>
            </div>

            <div class="form-check col-3 my-4 mx-auto">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Примите условия и соглашения
                </label>
                <div class="invalid-feedback">
                    Вы должны принять перед отправкой.
                </div>
            </div>


            <button class="text-center btn btn-lg btn-primary my-4 mx-auto d-flex" name="doGo"
                type="submit">Зарегистрироваться</button>
        </form>
    </main>
    <?

include("template\\footer.php");
?>
</body>

</html>