<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Confirmación de correo</title>
	<link rel="shortcut icon" type="image/x-icon" href="https://montesfiles.000webhostapp.com/vista/subidas/logocelosomontes2.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
    		display:none;
		}
	</style>
</head>
<body>
	
	<?php
		require_once("C:/xampp/htdocs/osomontes/controlador/controller.php");
		require_once("C:/xampp/htdocs/osomontes/modelo/model.php");
			if(isset($_GET['c96SKyd6a4srfD9AKkarf53B'])){

				$id = $_GET['c96SKyd6a4srfD9AKkarf53B'];
				echo '<center><img src="https://montesfiles.000webhostapp.com/vista/subidas/Bienvenid@.png" style="width: 100%;"><h4>Dirección de correo electrónico activada con éxito</h4></center>';

				$cc = new Controller();
		  		$cc -> confirmarcorreoController();

			}
			else{

				echo '<br><br><center><h4>No tienes permisos para acceder aquí 🚫<br>💩</h4><br><h5>Te busca la NASA🚀 y Cuacua🕵️‍♂️</h5></center><br><br><br><br><br><br><br>';

			}
	?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>