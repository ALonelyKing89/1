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


		<!-- ПОДКЛЮЧЕНИЕ ШАПКИ -->
      	<? include("template/header.php"); ?>
<center><h1>Заявка</h1></center>


		<form method="POST">
		<div class="container-fluid p-0">
			<div class="container py-5" id="main">
				<!-- блок отвечающий за все содержимое за исключением шапки и подвала -->
				<div class="card">
				<div class="card mx-auto my-auto col-md-10 col-sm-12 col-lg-7 border-0">
				  <div class="card-body">
				    <div class="form-group">
				    	<div class="form-group">
						    <label for="">Название</label>
						    <input name="name" class="form-control" aria-label="With textarea" required></input>
					    </div>

						    <div class="form-group">
							    <label>Описание</label>
								<input name="description" class="form-control" aria-label="With textarea" required></input>							    
						    </div>

						    <div class="form-group">
							    <label>Категория</label>
							    <select name='category' type='int' class='form-control' required>
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
					<button type="submit" class="btn btn-primary container border-0"><b>ОТПРАВИТЬ</b></button>

					</div>
				</div>

			</div> 
		</form>
		<?
			require_once "template\\footer.php";
		?>
		<!-- подключение стилей и BOOTSTRAP -->
		<link rel="stylesheet" href="style/bootstrap.min.css">

			</div>
		</div> 
			</form>


<?
require_once "template\\footer.php";

?>
  </body>
</html>