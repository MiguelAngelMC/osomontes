<?php
require_once "conexion.php";

class Model extends Conexion{

	// Método que inserta los valores del registro en la BD
	static public function registroModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$nombre = $datos['valor_nombre'];
		$apellidos = $datos['valor_apellidos'];
		$sexo = $datos['valor_sexo'];
		$fecha_nacimiento = $datos['valor_fecha_nacimiento'];
		$telefono = $datos['valor_telefono'];
		$localidad = $datos['valor_localidad'];
		$estado = $datos['valor_estado'];
		$domicilio = $datos['valor_domicilio'];
		$correo = $datos['valor_correo'];
		$contra = password_hash($datos['valor_contra'], PASSWORD_BCRYPT);

		// Comprobar si existe una cuenta asociada a ese correo
		$dato1 = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo=:correo");
		$dato1 -> bindParam(':correo', $correo);
		$dato1 -> execute();
		$resultados = $dato1->fetch(PDO::FETCH_ASSOC);

		if(!empty($resultados)){
			
			return "no";

		}
		else{
			// Insertar en la base de datos si no existe el correo
		$dato2 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellidos, sexo, fecha_nac, celular, localidad, estado, domicilio, correo, contra, status, num_rol, fecha, hora, fecha_confirmacion, hora_confirmacion) VALUES (:nombre, :apellidos, :sexo, :fecha_nacimiento, :telefono, :localidad, :estado, :domicilio, :correo, :contra, 'desactivado', 2, :fecha, :hora, '0000-00-00', '00:00', NULL, NULL, NULL, NULL)");
		$dato2 -> bindParam(':nombre', $nombre);
		$dato2 -> bindParam(':apellidos', $apellidos);
		$dato2 -> bindParam(':sexo', $sexo);
		$dato2 -> bindParam(':fecha_nacimiento', $fecha_nacimiento);
		$dato2 -> bindParam(':telefono', $telefono);
		$dato2 -> bindParam(':localidad', $localidad);
		$dato2 -> bindParam(':estado', $estado);
		$dato2 -> bindParam(':domicilio', $domicilio);
		$dato2 -> bindParam(':correo', $correo);
		$dato2 -> bindParam(':contra', $contra);
		$dato2 -> bindParam(':fecha', $fecha);
		$dato2 -> bindParam(':hora', $hora);

		if($dato2->execute()){
			// Comprobar si existe una cuenta asociada a ese correo
			$dato3 = Conexion::conectar()->prepare("SELECT id_user FROM $tabla WHERE correo=:correo");
			$dato3 -> bindParam(':correo', $correo);
			$dato3 -> execute();
			$resultados2 = $dato3->fetch(PDO::FETCH_ASSOC);
			$id = $resultados2["id_user"];
			$url_pagina = 'https://192.168.1.70/osomontes';
			// Envió el correo de confirmación de cuenta con PHPMailer
			require_once('vistas/modulos/confirmacion_correo.php');
			return "ok";
			$resultados2->closeCursor();
			$dato3->close();
		}
		else{
			return "error";
		}
		$dato2->close();
		}
		$resultados->closeCursor();
		$dato1->close();
	}

	// Método que activa el correo de un usuario
	static public function confirmarcorreoModelo($id, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		// Obtengo los valores para las variables de sesión
		$dato = Conexion::conectar()->prepare("SELECT nombre, num_rol, fecha_confirmacion, hora_confirmacion FROM $tabla WHERE id_user=:id");
		$dato -> bindParam(':id', $id);
		$dato->execute();
		$resultados = $dato->fetch(PDO::FETCH_ASSOC);
		$fecha_confirmacion = $resultados['fecha_confirmacion'];
		$hora_confirmacion = $resultados['hora_confirmacion'];

		if(($fecha_confirmacion == '0000-00-00')){

			$datos = Conexion::conectar()->prepare("UPDATE usuario SET status='activo', fecha_confirmacion=:fecha, hora_confirmacion=:hora WHERE id_user=:id");
			$datos -> bindParam(':id', $id);
			$datos -> bindParam(':fecha', $fecha);
			$datos -> bindParam(':hora', $hora);
			$datos->execute();

			if($datos->execute()){

					session_start();
					$_SESSION['usuario'] = $resultados['nombre']; 
					$_SESSION['tipo'] = $resultados['num_rol'];

					return "ok";
			}

			$datos->close();

		}
		else{

			return "error";
		}

		$resultados->closeCursor();
		$dato->close();
		
	}

	// Método que consulta los valores del login en la BD
	static public function loginModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$correo = $datos['valor_correo'];
		$contra = $datos['valor_contra'];

		$datos = Conexion::conectar()->prepare("SELECT id_user, nombre, apellidos, correo, contra, status, num_rol FROM $tabla WHERE correo=:correo");
		$datos -> bindParam(':correo', $correo);
		$datos->execute();

		$resultados = $datos->fetch(PDO::FETCH_ASSOC);


		if(!empty($resultados) && password_verify($contra, $resultados['contra'])){

			// Verificar si la cuenta está activada o no
			if($resultados['status'] == 'activo'){
				$_SESSION['usuario'] = $resultados['nombre'];
				$_SESSION['apellidos'] = $resultados['apellidos'];
				$_SESSION['tipo'] = $resultados['num_rol'];
				$_SESSION['id_usuario'] = $resultados['id_user'];

				// establecer fecha y hora del inicio de sesión
				$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_ultima_sesion=:fecha, hora_ultima_sesion=:hora WHERE correo=:correo");
				$datos2 -> bindParam(':correo', $correo);
				$datos2 -> bindParam(':fecha', $fecha);
				$datos2 -> bindParam(':hora', $hora);

				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}
				$datos2->close();

			}
			else{
				return "no";
			}
			
		}
		else{
			return "error";
		}
		$resultados->closeCursor();
		$datos->close();
	}

	// Método que consulta a la bd la información del perfil del usuario con su id
	static public function vistaPerfilModelo($id_usuario, $tabla){
		$consulta = Conexion::conectar()->prepare("SELECT nombre, apellidos FROM $tabla WHERE id_user = :id");
		$consulta -> bindParam(':id', $id_usuario);
		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	// Método que cambia el nombre del usuario respecto a su id
	static public function cambiarNombreModelo($id, $nombreNvo, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre_usuario WHERE id_user=:id");
		$datos -> bindParam(':id', $id);
		$datos -> bindParam(':nombre_usuario', $nombreNvo);
		$datos->execute();

		if($datos->execute()){

			$_SESSION['usuario'] = $nombreNvo;

			return "ok";
		}
		else{

			return "error";
		}

		$datos->close();
		
	}

	// Método que cambia los apellidos del usuario respecto a su id
	static public function cambiarApellidosModelo($id, $apellidosNvos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("UPDATE $tabla SET apellidos=:apellidos_usuario WHERE id_user=:id");
		$datos -> bindParam(':id', $id);
		$datos -> bindParam(':apellidos_usuario', $apellidosNvos);
		$datos->execute();

		if($datos->execute()){

			$_SESSION['apellidos'] = $apellidosNvos;

			return "ok";
		}
		else{

			return "error";
		}

		$datos->close();
		
	}

	// Método que verifica la contraseña de verificar_contra.php con el id del usuario
	static public function verificarContraModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$id_usuario = $datos['valor_id'];
		$contra = $datos['valor_contra'];

		$datos = Conexion::conectar()->prepare("SELECT contra FROM $tabla WHERE id_user=:id_usuario");
		$datos -> bindParam(':id_usuario', $id_usuario);
		$datos->execute();

		$resultados = $datos->fetch(PDO::FETCH_ASSOC);


		if(!empty($resultados) && password_verify($contra, $resultados['contra'])){

			return "ok";
		}
		else{
			return "error";
		}
		$resultados->closeCursor();
		$datos->close();
	}

	// Método que cambia la contraseña del usuario con su id y verifica si es otra diferente
	static public function cambiarContraModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$id_usuario = $datos['valor_id'];
		$contra = $datos['valor_contra'];

		$datos = Conexion::conectar()->prepare("SELECT contra FROM $tabla WHERE id_user=:id_usuario");
		$datos -> bindParam(':id_usuario', $id_usuario);
		$datos->execute();

		$resultados = $datos->fetch(PDO::FETCH_ASSOC);


		if(!empty($resultados) && password_verify($contra, $resultados['contra'])){

			return "existe";
		}
		else if(!empty($resultados) && !password_verify($contra, $resultados['contra'])){
			$contra_nueva = password_hash($contra, PASSWORD_BCRYPT);

			$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET contra=:contra WHERE id_user=:id");
			$datos2 -> bindParam(':id', $id_usuario);
			$datos2 -> bindParam(':contra', $contra_nueva);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->closeCursor();
			$datos2->close();
			
		}
		else{
			return "error";
		}
		$resultados->closeCursor();
		$datos->close();
	}

	// Método que envía el correo de la contraseña olvidada
	static public function olvidadaModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$correo = $datos['valor_correo'];
		$contra = $datos['valor_contra'];

		$datos = Conexion::conectar()->prepare("SELECT id_user, nombre, correo, contra, status, num_rol FROM $tabla WHERE correo=:correo");
		$datos -> bindParam(':correo', $correo);
		$datos->execute();

		$resultados = $datos->fetch(PDO::FETCH_ASSOC);


		if(!empty($resultados) && password_verify($contra, $resultados['contra'])){

			// Verificar si la cuenta está activada o no
			if($resultados['status'] == 'activo'){
				session_start();
				$_SESSION['usuario'] = $resultados['nombre'];
				$_SESSION['tipo'] = $resultados['num_rol'];
				return "ok";
			}
			else{
				return "no";
			}
			
		}
		else{
			return "error";
		}
		$datos->close();
	}

	//Método que inserta los valores de registrar_categoria en la BD
	static public function registrarCategoriaModelo($nombreCategoria, $tabla){

		//obtener fecha y hora actual en Nayarit
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$consulta1 = Conexion::conectar()->prepare("SELECT nombre_categoria FROM $tabla WHERE nombre_categoria=:nombre");
		$consulta1->bindParam(':nombre', $nombreCategoria);
		$consulta1->execute();
		$result1 = $consulta1->fetch(PDO::FETCH_ASSOC);

		// Verificar si ya existe una categoría igual
		if(!empty($result1)){

			return "existe";
		}
		else{

			$consulta2 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_categoria, fecha, hora) VALUES(:nombre_categoria, :fecha, :hora)");
			$consulta2->bindParam(':nombre_categoria', $nombreCategoria);
			$consulta2->bindParam(':fecha', $fecha);
			$consulta2->bindParam(':hora', $hora);
			if($consulta2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$consulta2->close();
			
		}
		$result1->closeCursor();
		$consulta1->close();
	}

	// Método que cambia el nombre de la categoria
	static public function editarCategoriaModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$categoria = $datos['valor_categoria'];
		$nvoNombre = $datos['valor_nvoNombre'];

		if($categoria == $nvoNombre){

			return "esigual";
		}

		$datos = Conexion::conectar()->prepare("SELECT nombre_categoria FROM $tabla WHERE nombre_categoria=:categoria");
		$datos->bindParam(':categoria', $categoria);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria=:nuevoNombre, fecha_modificacion=:fecha, hora_modificacion=:hora WHERE nombre_categoria=:categoria");
			$datos2 -> bindParam(':categoria', $categoria);
			$datos2 -> bindParam(':nuevoNombre', $nvoNombre);
			$datos2 -> bindParam(':fecha', $fecha);
			$datos2 -> bindParam(':hora', $hora);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

	// Método que elimina una categoría con el nombre de la categoria
	static public function eliminarCategoriaModelo($categoria, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("SELECT nombre_categoria FROM $tabla WHERE nombre_categoria=:categoria");
		$datos->bindParam(':categoria', $categoria);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE nombre_categoria=:categoria");
			$datos2 -> bindParam(':categoria', $categoria);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

	// Método que consulta a la bd las categorías
	static public function vistaCategoriasModelo($tabla){

		$consulta = Conexion::conectar()->prepare("SELECT nombre_categoria, fecha, hora, fecha_modificacion, hora_modificacion FROM $tabla");

		$consulta -> execute();

		return $consulta -> fetchAll();
		$consulta -> close();
	}

	static public function paginacion($tabla, $articulosXPagina){

		$consulta = Conexion::conectar()->prepare("SELECT nombre_categoria, fecha, hora, fecha_modificacion, hora_modificacion FROM $tabla ORDER BY fecha, hora ASC");

		$consulta -> execute();

		// Contar filas de la consulta
		$totalArticulosBD = $consulta->rowCount();
		echo '&nbsp;&nbsp;<b>Total de categorías: </b>'.$totalArticulosBD;

		// Contar el número de páginas
		$paginas = ($totalArticulosBD / $articulosXPagina);
		$paginas = ceil($paginas);
		//echo '<br>&nbsp;&nbsp;<b>Total de páginas: </b>'.$paginas;
		if(($_GET['pagina']*$articulosXPagina) < $totalArticulosBD){
			echo '<br>&nbsp;&nbsp;<b>Mostrando </b>'.($_GET['pagina']*$articulosXPagina).'<b> de </b>'.$totalArticulosBD;
		}
		else{
			echo '<br>&nbsp;&nbsp;<b>Mostrando </b>'.$totalArticulosBD.'<b> de </b>'.$totalArticulosBD;
		}

		// Comprobar si está vacía la tabla categoria
		if($paginas == 0){
			$paginas = 1;
		}
		return $paginas;
	}

	// Método que consulta a la bd las categorías para ordenarlas por órden alfabético y mostrarlas en el select
	static public function vistaCategoriasSelectModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT nombre_categoria, fecha, hora FROM $tabla ORDER BY nombre_categoria ASC");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	//Método que inserta los valores de registrar_marca en la BD
	static public function registrarMarcaModelo($nombreMarca, $tabla){

		//obtener fecha y hora actual en Nayarit
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$consulta1 = Conexion::conectar()->prepare("SELECT nombre_marca FROM $tabla WHERE nombre_marca=:nombre");
		$consulta1->bindParam(':nombre', $nombreMarca);
		$consulta1->execute();
		$result1 = $consulta1->fetch(PDO::FETCH_ASSOC);

		// Verificar si ya existe una categoría igual
		if(!empty($result1)){

			return "existe";
		}
		else{

			$consulta2 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_marca, fecha, hora) VALUES(:nombre_marca, :fecha, :hora)");
			$consulta2->bindParam(':nombre_marca', $nombreMarca);
			$consulta2->bindParam(':fecha', $fecha);
			$consulta2->bindParam(':hora', $hora);
			if($consulta2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$consulta2->close();
			
		}
		$result1->closeCursor();
		$consulta1->close();
	}

	// Método que consulta a la bd las marcas
	static public function vistaMarcasModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT nombre_marca, fecha, hora, fecha_modificacion, hora_modificacion FROM $tabla");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	// Método que cambia el nombre de la marca
	static public function editarMarcaModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$marca = $datos['valor_marca'];
		$nvoNombre = $datos['valor_nvoNombre'];

		if($marca == $nvoNombre){

			return "esigual";
		}

		$datos = Conexion::conectar()->prepare("SELECT nombre_marca FROM $tabla WHERE nombre_marca=:marca");
		$datos->bindParam(':marca', $marca);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_marca=:nuevoNombre, fecha_modificacion=:fecha, hora_modificacion=:hora WHERE nombre_marca=:marca");
			$datos2 -> bindParam(':marca', $marca);
			$datos2 -> bindParam(':nuevoNombre', $nvoNombre);
			$datos2 -> bindParam(':fecha', $fecha);
			$datos2 -> bindParam(':hora', $hora);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

	// Método que elimina una marca con el nombre de la marca
	static public function eliminarMarcaModelo($marca, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("SELECT nombre_marca FROM $tabla WHERE nombre_marca=:marca");
		$datos->bindParam(':marca', $marca);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE nombre_marca=:marca");
			$datos2 -> bindParam(':marca', $marca);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

	// Método que consulta a la bd las categorías para ordenarlas por órden alfabético y mostrarlas en el select
	static public function vistaMarcasSelectModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT nombre_marca, fecha, hora FROM $tabla ORDER BY nombre_marca ASC");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	//Método que inserta los valores de registrar_proveedor en la BD
	static public function registrarProveedorModelo($datos, $tabla){

		//obtener fecha y hora actual en Nayarit
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$nombre = $datos['valor_nombre'];
		$apellidos = $datos['valor_apellidos'];
		$localidad = $datos['valor_localidad'];
		$telefono = $datos['valor_telefono'];


		$consulta1 = Conexion::conectar()->prepare("SELECT nombre_proveedor, apellidos_proveedor FROM $tabla WHERE nombre_proveedor=:nombre AND apellidos_proveedor=:apellidos");
		$consulta1->bindParam(':nombre', $nombre);
		$consulta1->bindParam(':apellidos', $apellidos);
		$consulta1->execute();
		$result1 = $consulta1->fetch(PDO::FETCH_ASSOC);

		// Verificar si ya existe un proveedor igual
		if(!empty($result1)){

			return "existe";
		}
		else{

			$consulta2 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_proveedor, apellidos_proveedor, localidad_proveedor, celular_proveedor, fecha_registro, hora_registro) VALUES(:nombre, :apellidos, :localidad, :telefono, :fecha, :hora)");
			$consulta2->bindParam(':nombre', $nombre);
			$consulta2->bindParam(':apellidos', $apellidos);
			$consulta2->bindParam(':localidad', $localidad);
			$consulta2->bindParam(':telefono', $telefono);
			$consulta2->bindParam(':fecha', $fecha);
			$consulta2->bindParam(':hora', $hora);
			if($consulta2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$consulta2->close();
			
		}
		$result1->closeCursor();
		$consulta1->close();
	}

	// Método que consulta a la bd los proveedores
	static public function vistaProveedoresModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT id_proveedor, nombre_proveedor, apellidos_proveedor, localidad_proveedor, celular_proveedor, fecha_registro, hora_registro, fecha_modificacion, hora_modificacion FROM $tabla");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	// Método que cambia todos los campos de un proveedor
	static public function editarProveedorModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		// Información actual del proveedor
		$idProveedor = $datos['valor_idProveedor'];
		$nombreProveedor = $datos['valor_nombreProveedor'];
		$apellidosProveedor = $datos['valor_apellidosProveedor'];
		$localidadProveedor = $datos['valor_localidadProveedor'];
		$telProveedor = $datos['valor_telProveedor'];

		// Nuevos valores que se establecerán
		$nvoNombre = $datos['valor_nvoNombre'];
		$nvosApellidos = $datos['valor_nvosApellidos'];
		$nvaLocali = $datos['valor_nvaLocali'];
		$nvoTel = $datos['valor_nvoTel'];

		// Verificar que almenos se modificó un campo
		if(($nombreProveedor != $nvoNombre) || ($apellidosProveedor != $nvosApellidos) || ($localidadProveedor != $nvaLocali) || ($telProveedor != $nvoTel)){

			$datos = Conexion::conectar()->prepare("SELECT nombre_proveedor FROM $tabla WHERE id_proveedor=:id AND nombre_proveedor=:nombreProveedor");
			$datos -> bindParam(':id', $idProveedor);
			$datos -> bindParam(':nombreProveedor', $nombreProveedor);
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
				$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_proveedor=:nuevoNombre, apellidos_proveedor=:nuevosApellidos, localidad_proveedor=:nuevaLocalidad, celular_proveedor=:nuevoCelular, fecha_modificacion=:fecha, hora_modificacion=:hora WHERE id_proveedor=:id AND nombre_proveedor=:nombreProveedor");
				$datos2 -> bindParam(':id', $idProveedor);
				$datos2 -> bindParam(':nombreProveedor', $nombreProveedor);
				$datos2 -> bindParam(':nuevoNombre', $nvoNombre);
				$datos2 -> bindParam(':nuevosApellidos', $nvosApellidos);
				$datos2 -> bindParam(':nuevaLocalidad', $nvaLocali);
				$datos2 -> bindParam(':nuevoCelular', $nvoTel);
				$datos2 -> bindParam(':fecha', $fecha);
				$datos2 -> bindParam(':hora', $hora);
				$datos2->execute();

				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}

	// Método que elimina un proveedor con el ID del proveedor
	static public function eliminarProveedorModelo($idProveedor, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("SELECT nombre_proveedor FROM $tabla WHERE id_proveedor=:id");
		$datos->bindParam(':id', $idProveedor);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_proveedor=:id");
			$datos2 -> bindParam(':id', $idProveedor);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

	// Método que consulta a la bd los proveedores para ordenarlos por órden alfabético y mostrarlos en el select
	static public function vistaProveedoresSelectModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT id_proveedor, nombre_proveedor, apellidos_proveedor FROM $tabla ORDER BY nombre_proveedor ASC");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	// Método que inserta los valores del registro_manual.php en la BD
	static public function registroManualModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");
		
		//obtengo los valores del arreglo
		$nombre = $datos['valor_nombre'];
		$apellidos = $datos['valor_apellidos'];
		$sexo = $datos['valor_sexo'];
		$fecha_nacimiento = $datos['valor_fecha_nacimiento'];
		$telefono = $datos['valor_telefono'];
		$localidad = $datos['valor_localidad'];
		$estado = $datos['valor_estado'];
		$domicilio = $datos['valor_domicilio'];
		$correo = $datos['valor_correo'];
		$contra = password_hash($datos['valor_contra'], PASSWORD_BCRYPT);
		$status = 'activo';
		$num_rol = $datos['valor_rol'];

		// Comprobar si existe una cuenta asociada a ese correo
		$dato1 = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo=:correo");
		$dato1 -> bindParam(':correo', $correo);
		$dato1 -> execute();
		$resultados = $dato1->fetch(PDO::FETCH_ASSOC);

		if(!empty($resultados)){
			
			return "no";

		}
		else{
			// Insertar en la base de datos si no existe el correo
		$dato2 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellidos, sexo, fecha_nac, celular, localidad, estado, domicilio, correo, contra, status, num_rol, fecha, hora, fecha_confirmacion, hora_confirmacion, fecha_ultima_sesion, hora_ultima_sesion, fecha_modificacion, hora_modificacion) VALUES (:nombre, :apellidos, :sexo, :fecha_nacimiento, :telefono, :localidad, :estado, :domicilio, :correo, :contra, :status, :num_rol, :fecha, :hora, :fecha_confirmacion, :hora_confirmacion, NULL, NULL, NULL, NULL)");
		$dato2 -> bindParam(':nombre', $nombre);
		$dato2 -> bindParam(':apellidos', $apellidos);
		$dato2 -> bindParam(':sexo', $sexo);
		$dato2 -> bindParam(':fecha_nacimiento', $fecha_nacimiento);
		$dato2 -> bindParam(':telefono', $telefono);
		$dato2 -> bindParam(':localidad', $localidad);
		$dato2 -> bindParam(':estado', $estado);
		$dato2 -> bindParam(':domicilio', $domicilio);
		$dato2 -> bindParam(':correo', $correo);
		$dato2 -> bindParam(':contra', $contra);
		$dato2 -> bindParam(':status', $status);
		$dato2 -> bindParam(':num_rol', $num_rol);
		$dato2 -> bindParam(':fecha', $fecha);
		$dato2 -> bindParam(':hora', $hora);
		$dato2 -> bindParam(':fecha_confirmacion', $fecha);
		$dato2 -> bindParam(':hora_confirmacion', $hora);


		if($dato2->execute()){
			// Comprobar si existe una cuenta asociada a ese correo
			$dato3 = Conexion::conectar()->prepare("SELECT id_user FROM $tabla WHERE correo=:correo");
			$dato3 -> bindParam(':correo', $correo);
			$dato3 -> execute();
			$resultados2 = $dato3->fetch(PDO::FETCH_ASSOC);
			$id = $resultados2["id_user"];
			$url_pagina = 'https://192.168.1.70/osomontes';
			// Envió el correo de confirmación de cuenta con PHPMailer
			//require_once('vistas/modulos/confirmacion_correo.php');
			return "ok";
			$resultados2->closeCursor();
			$dato3->close();
		}
		else{
			return "error";
		}
		$dato2->close();
		}
		$resultados->closeCursor();
		$dato1->close();
	}

	// Método que consulta a la bd los usuarios
	static public function vistaUsuariosModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	// Método que cambia todos los campos de un usuario
	static public function editarUsuarioModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		// Información actual del proveedor
		$idUsuario = $datos['valor_idUsuario'];
		$nombreProveedor = $datos['valor_nombreProveedor'];
		$apellidosProveedor = $datos['valor_apellidosProveedor'];
		$localidadProveedor = $datos['valor_localidadProveedor'];
		$telProveedor = $datos['valor_telProveedor'];

		// Nuevos valores que se establecerán
		$nvoNombre = $datos['valor_nvoNombre'];
		$nvosApellidos = $datos['valor_nvosApellidos'];
		$nvaLocali = $datos['valor_nvaLocali'];
		$nvoTel = $datos['valor_nvoTel'];

		// Verificar que almenos se modificó un campo
		if(($nombreProveedor != $nvoNombre) || ($apellidosProveedor != $nvosApellidos) || ($localidadProveedor != $nvaLocali) || ($telProveedor != $nvoTel)){

			$datos = Conexion::conectar()->prepare("SELECT nombre_proveedor FROM $tabla WHERE id_proveedor=:id AND nombre_proveedor=:nombreProveedor");
			$datos -> bindParam(':id', $idProveedor);
			$datos -> bindParam(':nombreProveedor', $nombreProveedor);
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
				$datos2 = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_proveedor=:nuevoNombre, apellidos_proveedor=:nuevosApellidos, localidad_proveedor=:nuevaLocalidad, celular_proveedor=:nuevoCelular, fecha_modificacion=:fecha, hora_modificacion=:hora WHERE id_proveedor=:id AND nombre_proveedor=:nombreProveedor");
				$datos2 -> bindParam(':id', $idProveedor);
				$datos2 -> bindParam(':nombreProveedor', $nombreProveedor);
				$datos2 -> bindParam(':nuevoNombre', $nvoNombre);
				$datos2 -> bindParam(':nuevosApellidos', $nvosApellidos);
				$datos2 -> bindParam(':nuevaLocalidad', $nvaLocali);
				$datos2 -> bindParam(':nuevoCelular', $nvoTel);
				$datos2 -> bindParam(':fecha', $fecha);
				$datos2 -> bindParam(':hora', $hora);
				$datos2->execute();

				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}

	// Método que elimina una usuario con el ID y su nombre
	static public function eliminarUsuarioModelo($datos, $tabla){

		//obtener fecha y hora
		date_default_timezone_set("America/Mazatlan");
		$hora = date("H:i:s");
		$fecha = date("Y-m-d");

		$datos = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE nombre=:categoria");
		$datos->bindParam(':categoria', $categoria);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE nombre=:nombre");
			$datos2 -> bindParam(':nombre', $nombreUsuario);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}

}
?>