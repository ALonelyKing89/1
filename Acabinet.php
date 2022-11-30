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
require_once "template\header.php"; 
?>

<center><h1>ADMINISTRATOR</h1></center>


<?
require_once "template\\footer.php";

?>
  </body>
</html>