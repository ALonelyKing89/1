<?
// Подключаемся к СЕССИИ
session_start();
$i=0;
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
$dbh = new PDO('mysql:dbname=hakaton2022;host=localhost', 'root', '');
$sth = $dbh->prepare("SELECT `status` FROM `problem`");
$sth->execute();
foreach($sth as $log){
  if($log['status']!="новая") {
    $i++;
  }
  echo 'заявок решено '.$i;
}
?>
<?
include("template\\footer.php");

?>
</body>
</html>