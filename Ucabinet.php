<?
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';
$l = $db->query('SELECT * FROM request');
//$prob = $db->query('SELECT * FROM probl');
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

<center><h1>USER</h1></center>

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
foreach ($l as $log){
                      echo 
                      "<center>"."<table>"."<thead>"."<tr>"."<th>Название<th>"."<th>Описание<th>"."<th>IDN<th>"."<th>Фото<th>"."</tr>"."</thead>"."<tbody>"."<tr>"."<th>".$log["name"]."<th>"."<th>".$log["description"]."<th>"."<th>".$log["id_category"]."<th>"."<th>".$log["photo"]."<th>"."</tr>"."</tbody>"."</table>"."</center>";
                  };
?>






<?
require_once "template\\footer.php";
?>
  </body>
</html>