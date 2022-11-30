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
		<h1 class="text-center py-3">Критерии</h1>
		<div class="table-responsive col-sm-12 col-md-9 mx-auto">
			<table class="table table-bordered">
				<tbody>
					<?
					$output = $db->query('SELECT * FROM problem');
					foreach ($output as $out) {
						echo "<tr>";
						echo  "<td class='d-flex justify-content-between'><span>" . $out["name_problem"] . "</span><a type='button' href=?del_id=" . $out['id_category'] . " ><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='text-danger bi bi-x-circle text-center' viewBox='0 0 16 16'>
							<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'></path>
							<path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'></path></svg></a></td>";
						echo "<tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<?
	require_once "template\\footer.php";

	?>
</body>

</html>