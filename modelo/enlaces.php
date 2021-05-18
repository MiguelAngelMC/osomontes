<?php
	class Paginas{

		// Método que redirecciona al usuario dependiendo de lo que eligió en el menú
		static public function enlacesPaginasModelo($enlaces){

			if ($enlaces == 'login'){

				if(empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/login.php';

				}
				else{

					$contenido = "vistas/modulos/principal.php";

				}

			}
			else if($enlaces == 'ver_perfil'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/perfil.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_nombre'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/nombre.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_apellidos'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/apellidos.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'verificar_contra'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/verificar_contra.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_contra'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/contra.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_celular'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/cambiar_celular.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_localidad'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/cambiar_localidad.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_estado'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/cambiar_estado.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_domicilio'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/cambiar_domicilio.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'cambiar_cp'){

				if(!empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/cambiar_cp.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'olvidada'){
				$contenido = 'vistas/modulos/olvidada.php';
			}
			else if($enlaces == 'registro'){

      			if(empty($_SESSION['usuario'])){

					$contenido = 'vistas/modulos/registro.php';

				}
				else{

					$contenido = "vistas/modulos/principal.php";

				}
				
			}
			else if($enlaces == 'correo_bienvenida'){

				$contenido = 'vistas/modulos/correo_bienvenida.php';

			}
			else if($enlaces == 'principal'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){

					$contenido = "vistas/modulos/dashboard.php";

				}
				else{

					$contenido = "vistas/modulos/principal.php";
					
				}

			}
			else if($enlaces == 'cerrar_sesion'){
				$contenido = 'vistas/modulos/cerrar.php';
			}
			else if($enlaces == 'todo'){
				$contenido = "vistas/modulos/todo.php";
			}
			else if($enlaces == 'celulares'){
				$contenido = "vistas/modulos/celulares.php";
			}
			else if($enlaces == 'liberaciones'){
				$contenido = "vistas/modulos/liberaciones.php";
			}
			else if($enlaces == 'recargas'){
				$contenido = "vistas/modulos/recargas.php";
			}
			else if($enlaces == 'fundas'){
				$contenido = "vistas/modulos/fundas.php";
			}
			else if($enlaces == 'micas'){
				$contenido = "vistas/modulos/micas.php";
			}
			else if($enlaces == 'audifonos'){
				$contenido = "vistas/modulos/audifonos.php";
			}
			else if($enlaces == 'cargadores'){
				$contenido = "vistas/modulos/cargadores.php";
			}
			else if($enlaces == 'subearchivo'){
				$contenido = "vistas/modulos/subearchivo.php";
			}
			else if($enlaces == 'ver_pelicula'){

				if(empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 2)){
					$contenido = "vistas/modulos/pelicula.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'registrar_producto'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/registrar_producto.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'registrar_categoria'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/registrar_categoria.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'editar_categoria'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/editar_categoria.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'eliminar_categoria'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/eliminar_categoria.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'registrar_proveedor'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/registrar_proveedor.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'registrar_marca'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/registrar_marca.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'ver_marcas'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/ver_marcas.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'editar_marca'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/editar_marca.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'eliminar_marca'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/eliminar_marca.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'ver_categorias'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/ver_categorias.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'ver_proveedores'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/ver_proveedores.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'editar_proveedor'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/editar_proveedor.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'eliminar_proveedor'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/eliminar_proveedor.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'registro_manual'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/registro_manual.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'ver_usuarios'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/ver_usuarios.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'editar_usuario'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/editar_usuario.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'eliminar_usuario'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/eliminar_usuario.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'info_usuario'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/info_usuario.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'ver_productos'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/ver_productos.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'editar_producto'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/editar_producto.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'eliminar_producto'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 1)){
					$contenido = "vistas/modulos/eliminar_producto.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'carrito'){

				if((!empty($_SESSION['usuario'])) && ($_SESSION['tipo'] == 2)){
					$contenido = "vistas/modulos/carrito.php";
				}
				else{
					$contenido = "vistas/modulos/confirmar_correo.php";
				}
			}
			else if($enlaces == 'pagar'){

				if(!empty($_SESSION['usuario']) && ($_SESSION['tipo'] == 2) && !empty($_SESSION['carrito'])){

					$contenido = 'vistas/modulos/pagar.php';

				}
				else{

					$contenido = "vistas/modulos/confirmar_correo.php";

				}

			}
			else if($enlaces == 'buscar'){

				if(!empty($_GET['s'])){

					$contenido = 'vistas/modulos/buscar.php';

				}
				else{

					$contenido = "vistas/modulos/principal.php";

				}

			}
			else{
				$contenido = "vistas/modulos/principal.php";
			}

			return $contenido;
		}
		
	}
?>