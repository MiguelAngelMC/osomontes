<?php
	
	if(isset($_GET['id'])){
		echo "Tepiiiiiiiiiiiii ".$_GET['id'];
		$calcular = new Controller();
  		$calcular -> eliminarProductoController($_GET['id']);
	}

?>