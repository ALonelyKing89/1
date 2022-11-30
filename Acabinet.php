<?
// Подключаемся к СЕССИИ
session_start();


if ($_SESSION['adm'] != 1) {
  header('Location:index.php');
}
// Подключаемся к БД
require_once 'db.php';
//$prob = $db->query('SELECT * FROM probl');

if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
  //удаляем строку из таблицы
  $sql = mysqli_query($db, "DELETE FROM `category` WHERE `id_category` = {$_GET['del_id']}");
  $sql2 = mysqli_query($db, "DELETE FROM `problem` WHERE `id_category` = {$_GET['del_id']}");

  if ($sql and $sql2) {
    echo "<p>Категория и заявки связанные с ней были удалены</p>";
  } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
  }
}

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
    <div class="d-flex justify-content-between">
      <h1>Режим просмотра</h1>
      <a class="btn btn-primary" href="/edit.php" role="button">Критерии</a>
    </div>
		
		<div class="table-responsive col-sm-12 col-md-9 mx-auto">
			<?
      $output = $db->query('SELECT * FROM `problem` INNER JOIN category ON problem.id_category = category.id_category WHERE `status` = "новая"');
      foreach ($output as $out) {
        echo '<div class="d-flex justify-content-center">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="https://kartinkof.club/uploads/posts/2022-03/1648241964_6-kartinkof-club-p-billi-kherrington-mem-7.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-header">
                  ' . $out["name_category"] . '
                </div>
                <div class="card-body">
                  <h5 class="card-title">' . $out["name_problem"] . '</h5>
                  <p class="card-text"></p>                  
                  <p class="card-text"><small class="text-muted">' . $out["time"] . '</small></p>    
                </div>
              </div>
            </div>
          </div>
</div>';
      }
      ?>
			</tbody>
		</div>
	</div>


	<?
  require_once "template\\footer.php";

  ?>
</body>

</html>