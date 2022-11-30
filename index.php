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
$sql='SELECT * FROM request';
foreach ($conn->query($sql) as $row){
  print $row['name']."\t";
  print $row['id_category']."\t";
  print $row['photo']."\n";
}


$select = $connection->query("SELECT * FROM request");
if($db) {
    echo 'select()'.$select;
}
?>
<?
include("template\\footer.php");

?>
</body>
</html>