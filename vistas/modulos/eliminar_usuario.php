<?php
	if(isset($_GET['id_usuario']) && isset($_GET['nombre_usuario']) && isset($_GET['apellidos_usuario'])){
		$calcular = new Controller();
	  	$calcular -> eliminarUsuarioController($_GET['id_usuario'], $_GET['nombre_usuario'], $_GET['apellidos_usuario']);
	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>