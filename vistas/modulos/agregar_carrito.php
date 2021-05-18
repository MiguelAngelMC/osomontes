<?php
session_start();

$idProductos = array_column($_SESSION['carrito'], "id_producto");

if(in_array($_POST['id_producto'], $idProductos)){
	echo "yaexiste";
}else{

	if(isset($_POST['id_producto']) && isset($_POST['ruta_imagen_producto']) && isset($_POST['nombre_producto']) && isset($_POST['almacenamiento']) && isset($_POST['precio_producto']) && empty($_SESSION['carrito'])){

			$producto = array(
			'id_producto' => $_POST['id_producto'],
			'ruta_imagen_producto' => $_POST['ruta_imagen_producto'],
			'nombre_producto' => $_POST['nombre_producto'],
			'almacenamiento' => $_POST['almacenamiento'],
			'precio' => $_POST['precio_producto']
			);
			$_SESSION['carrito'][0] = $producto;
			var_dump($_SESSION['carrito']);
	}
	else if(isset($_POST['id_producto']) && isset($_POST['ruta_imagen_producto']) && isset($_POST['nombre_producto']) && isset($_POST['almacenamiento']) && isset($_POST['precio_producto']) && !empty($_SESSION['carrito'])){

			$numeroProductos = count($_SESSION['carrito']);
			$producto = array(
			'id_producto' => $_POST['id_producto'],
			'ruta_imagen_producto' => $_POST['ruta_imagen_producto'],
			'nombre_producto' => $_POST['nombre_producto'],
			'almacenamiento' => $_POST['almacenamiento'],
			'precio' => $_POST['precio_producto']
			);
			array_push($_SESSION['carrito'],$producto);
			var_dump($_SESSION['carrito']);
	}

	echo "ok";
}
	
?>