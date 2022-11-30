<?
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php';
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
include("template\header.php"); 
?>

<?

$sth = $db->prepare("SELECT `status` FROM `problem`");

foreach($sth as $log){
  echo $log["status"];
}
?>
<?
include("template\\footer.php");

?>
</body>
</html>