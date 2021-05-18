<?php
session_start();

foreach($_SESSION['carrito'] as $indice => $dato){
	if($dato['id_producto'] == $_POST['id_producto']){
		unset($_SESSION['carrito'][$indice]);
		echo "borrado";
	}
	else{
		echo "noexiste";
	}
}
	
?>