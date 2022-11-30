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
$sth = $db->query("SELECT `status` FROM `problem`");
foreach($sth as $log){
  if($log['status']!="новая") {
    $i++;
  }  
}
?>
<div class="conteiner">
  <center>
    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
      <div class="card-header">Заявок решено</div>
      <div class="card-body">
        <h2 class="card-title"><?echo $i;?></h5>
      </div>
    </div>
  </center>
</div>
<?
$l = $db->query('SELECT `time`,`name_problem`,`name_category`,`status`,`name_photo` FROM `problem` JOIN `category` ON `problem`.`id_category`=`category`.`id_category` JOIN `photo` ON `problem`.`id_photo`=`photo`.`id_photo`');
foreach($l as $log){

}
?>


<?
include("template\\footer.php");

?>

</body>
</html>