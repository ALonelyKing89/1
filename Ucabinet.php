<?
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';
$l = $db->query('SELECT * FROM request INNER JOIN category ON request.id_category = category.id_category');
if (!isset($_SESSION['login']) ) {
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
	<form method="post">
	<center>
		<button name="doCreate" class="btn btn-secondary mt-5 col-2" type="submit">Создать заявку</button>
	</center>	
	</form>
		<center>
		<h3 class="mt-4">Ваши заявки</h1>
	</center>
</div>

<?
/* Запрос в БД */
/* Все варианты сортировки */
$sort_list = array(
	'date'       => '`date`',
	'type'       => '`type`',
	'food'       => '`food`',
	'price_asc'  => '`price`',
	'price_desc' => '`price` DESC',   
);
 
/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}
 
/* Запрос в БД */
$dbh = new PDO('mysql:dbname=hakaton2022;host=localhost', 'root', '');
$sth = $dbh->prepare("SELECT * FROM `hakaton2022` ORDER BY {$sort_sql}");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<?
foreach($l as $log){
    echo '<center>
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://kartinkof.club/uploads/posts/2022-03/1648241964_6-kartinkof-club-p-billi-kherrington-mem-7.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$log["name_request"].'</h5>
        <p class="card-text">'.$log["description_request"].'</p>
        <p class="card-text"><small class="text-muted">'.$log["name_category"].'</small></p>
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