<?php
//Подключаем сессию
session_start();


//Подключение БД
require_once 'db.php';

if (isset($_POST["doGo"])) {
	//Передача содержимого полей для запроса
	$snumcomputer = htmlspecialchars($_POST['numcomputer']);
	$scabinet = htmlspecialchars($_POST['cabinet']);
	$sresponsible = htmlspecialchars($_POST['responsible']);
	$sCPU = htmlspecialchars($_POST['CPU']);

	$sql ="INSERT INTO equipment (NumComputer, id_cabinet, id_responsible, CPU, GPU, RAM, HDD, Motherboard, PowerSupply, Cooler, DiskDrive, ComputerCase)
	VALUES ('$snumcomputer', '$scabinet', '$sresponsible', '$sCPU', '$sGPU', '$sRAM', '$sHDD', '$smotherboard', '$spowersupply', '$scooler', '$sdiskdrive', '$scase')"; 

	if ($db->query($sql) === TRUE) {
		echo "<script>alert('Данные отправлены!');</script>";
	} else {
		echo "<script>alert('Ошибка отправки данных!');</script>";
	}
}

if (!isset($_SESSION['login'])){
    //Выкидывает неавторизванного пользователя 
    //переадресуем пользователя на личный кабинет
    header('Location:login.php');
}
?>

<html>
<head>
	<title>Заявка</title>
</head>
	<body>
		<form method="POST">
		<div class="container-fluid p-0">

		<!-- ПОДКЛЮЧЕНИЕ ШАПКИ -->
      	<? include("template/header.php"); ?>

			<div class="container py-5" id="main">
				<!-- блок отвечающий за все содержимое за исключением шапки и подвала -->
				<div class="card">
				<p class="h1 text-center my-4 fw-bold">Заявка</p>
				<div class="card mx-auto my-auto col-md-10 col-sm-12 col-lg-7 border-0">
				  <div class="card-body">
				    <div class="form-group">
				    	<div class="form-group">
						    <label for="exampleFormControlInput1">Название</label>
						    <input name="numcomputer" class="form-control" aria-label="With textarea" id="validationDefault01" required></input>
					    </div>

						    <div class="form-group">
							    <label for="exampleFormControlSelect1">Описание</label>
								<input name="CPU" class="form-control" aria-label="With textarea" id="validationDefault01" required></input>							    
						    </div>

						    <div class="form-group">
							    <label for="exampleFormControlSelect1">Категория</label>
							    <select name='category' type='int' class='form-control' id='id_category' required>
								<?php 
									$result_select = mysqli_query($db,"SELECT * FROM category");
		          					while($object = mysqli_fetch_object($result_select)){
		  								echo "<option value='$object->id_category'> $object->name</option>";
		  							}
								?>
								</select>
						    </div>	

    						<div class="container">
        						<div class="row">
            						<label>Загрузить фото:</label>
            						<input type="file" id="file" name="file" aria-label="With textarea" />
        						</div>
        						<div class="row">
            						<span id="output"></span>
        						</div>
    						</div>	
    						<p>					    	
		</div>

    <script>
    function handleFileSelect(evt) {
        var file = evt.target.files; // FileList object
        var f = file[0];
        // Only process image files.
        if (!f.type.match('image.*')) {
            alert("Image only please....");
        }
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                document.getElementById('output').insertBefore(span, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
    document.getElementById('file').addEventListener('change', handleFileSelect, false);
    </script>
					<button name="doGo" type="submit" class="btn btn-primary container border-0"><b>ОТПРАВИТЬ</b></button>

					</div>
				</div>
			</div> 
		</form>
		<?
			require_once "template\\footer.php";
		?>
		<!-- подключение стилей и BOOTSTRAP -->
		<link rel="stylesheet" href="style/bootstrap.min.css">

		<!-- подключение библиотек JS : BOOTSTRAP, JQuery, Popper -->
		<script src="script/jquery-3.2.1.slim.min.js"></script>
		<script src="script/bootstrap.min.js"></script>
		<script src="script/popper.min.js"></script>


	</body>
</html>