<?
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';
$l = $db->query('SELECT * FROM problem INNER JOIN category ON problem.id_category = category.id_category WHERE id_user = ' . $_SESSION['idUser'] . '');
if (!isset($_SESSION['login'])) {
  header('Location:index.php');
}
//$prob = $db->query('SELECT * FROM probl');
if (isset($_POST["doCreate"])) {
  header('Location:request.php');
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?
  //Вывод шапки
  require_once "template\header.php";
  ?>

  <div class="container">
    <center>
      <h1>Личный кабинет пользователя</h1>
    </center>
    <form class="text-center" method="post">
      <button name="doCreate" class="btn btn-secondary mt-5" type="submit">Создать заявку</button>
      </center>
    </form>
    <center>
      <h3 class="mt-4">Ваши заявки</h1>
    </center>
  </div>


  <?
  foreach ($l as $log) {
    echo '<center>
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://kartinkof.club/uploads/posts/2022-03/1648241964_6-kartinkof-club-p-billi-kherrington-mem-7.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">' . $log["name_problem"] . '</h5>
        <p class="card-text">' . $log["text_problem"] . '</p>
        <p class="card-text"><small class="text-muted">' . $log["name_category"] . '</small></p>
      </div>
    </div>
  </div>
</div>
</center>';
  };
  ?>


  <?
  require_once "template\\footer.php";
  ?>
</body>

</html>