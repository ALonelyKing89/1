<?php
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';



// Очистка сессии если пользователь нажал выйти
session_unset();

//----------РАБОТА С ФОРМОЙ
// Проверяем нажата ли кнопка отправки формы
if (isset($_POST["doGo"])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['pass']);

    // вносим пользователя в базу данных
    $sql = "INSERT INTO users (`login`, `password`)
	VALUES ('$login', '$password')";

    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Данные отправлены!');</script>";
    } else {
        echo "<script>alert('Ошибка отправки данных!');</script>";
    }

}
?>


<html>

<head>
    <title>Регистрация</title>
</head>

<body>

    <main class="form-signin w-100 m-auto">
        <form class="container">
            <img class="mx-auto my-4 d-flex col-1" src="logo.png">
            <h1 class="h3 my-5 fw-normal text-center">Регистрация</h1>

            <div class="form-floating col-3 my-4 mx-auto">
                <input type="email" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label for="floatingInput">login</label>
            </div>
            <div class="form-floating col-3 my-4 mx-auto">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="pass">
                <label for="floatingPassword">password</label>
            </div>

            <button class="text-center btn btn-lg btn-primary my-4 mx-auto d-flex" type="submit">Зарегистрироваться</button>
        </form>
    </main>

</body>

</html>