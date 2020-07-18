<?php
	if(isset($_GET['id_proveedor']) && isset($_GET['nombre_proveedor']) && isset($_GET['apellidos_proveedor'])){
		$calcular = new Controller();
	  	$calcular -> eliminarProveedorController($_GET['id_proveedor'], $_GET['nombre_proveedor'], $_GET['apellidos_proveedor']);
	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>