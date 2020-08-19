<?php
	class Controller{

		// Método para cargar la plantilla
		static public function pagina(){
			include("vistas/plantillas.php");
		}
		
		// Método para los enlaces
		static public function enlacesPaginaController(){
			if(isset($_GET['opcion'])){
				$enlaces = $_GET['opcion'];
			}
			else{
				$enlaces = "principal";
			}

			$respuesta = Paginas::enlacesPaginasModelo($enlaces);
			include $respuesta;
		}

		// Método que recibe los valores del formulario de registro
		static public function registroController(){
			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre']) && !empty($_POST['ape']) && !empty($_POST['sexo']) && !empty($_POST['fecha_nac']) && !empty($_POST['tel']) && !empty($_POST['locali']) && !empty($_POST['estado']) && !empty($_POST['domic']) && !empty($_POST['cp']) && !empty($_POST['corre']) && !empty($_POST['contra'])){

					$datos = array('valor_nombre'=>$_POST['nombre'], 'valor_apellidos'=>$_POST['ape'], 'valor_sexo'=>$_POST['sexo'], 'valor_fecha_nacimiento'=>$_POST['fecha_nac'], 'valor_telefono'=>$_POST['tel'], 'valor_localidad'=>$_POST['locali'], 'valor_estado'=>$_POST['estado'], 'valor_domicilio'=>$_POST['domic'], 'valor_cp'=>$_POST['cp'], 'valor_correo'=>$_POST['corre'], 'valor_contra'=>$_POST['contra']);

					$respuesta = Model::registroModelo($datos, "usuario");
					
					if($respuesta == "ok"){
						echo '<script>
						(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								timer: 5000,
								timerProgressBar: true,
								title: "Usuario registrado con éxito",
								text: "Verifique su correo electrónico para activar su cuenta",
								footer: "Redireccionando al inicio de sesión."
							});
							
							if(a){
								window.location="index.php?opcion=login";
							}

							})()
						
						</script>
						';
					}
					else if($respuesta == "no"){
						echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Pruebe con otro correo electrónico porfavor"
							});
						</script>
						';
					}
					else{
						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups! Ocurrió un error al registrarte"
							});
						window.location="index.php?opcion=registro";
						</script>
						';
					}
				}
				else{
					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
				}
			}
		}

		// Método que recibe los valores para confirmar el correo en la BD
		static public function confirmarcorreoController(){

			if(!empty($_GET['c96SKyd6a4srfD9AKkarf53B'])){

				$respuesta = Model::confirmarcorreoModelo($_GET['c96SKyd6a4srfD9AKkarf53B'], "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
						(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								timer: 5000,
								timerProgressBar: true,
								title: "Cuenta verificada",
								text: "Tu cuenta ha sido verificada con éxito",
								footer: "Iniciando sesión."
							});
							
							if(a){
								window.location="index.php?opcion=principal";
							}

							})()
						
						</script>
						';
				}
				else{
					echo '<script>
					Swal.fire({
							icon: "error",
							timer: 5000,
							timerProgressBar: true,
							title: "¡Ups! hubo un error al confirmar tu correo"
						});
					</script>
					';
				}
			}

		}

		// Método que recibe los valores del formulario de login
		static public function loginController(){

			if(!empty($_POST['corre']) && !empty($_POST['contra'])){

				$datos = array('valor_correo'=>$_POST['corre'], 'valor_contra'=>$_POST['contra']);

				$respuesta = Model::loginModelo($datos, "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
						var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
						notificacion.load();
						(async () => {

							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "Bienvenido '.$_SESSION["usuario"].'",
								text: "Disfruta de todos nuestros diferentes servicios 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=principal";
							}

							})()
						
						</script>';
				}
				else if($respuesta == "no"){
					echo '<script>
					var siVibra= "vibrate" in navigator;
					if(siVibra){
						navigator.vibrate(200);
					}
					var notificacion = new Audio("vistas/audio/notificacion_error.mp3");
					notificacion.load();
					notificacion.play();
					Swal.fire({
							icon: "info",
							timer: 5000,
							timerProgressBar: true,
							title: "Porfavor verifica tu cuenta",
							text: "Ve a tu correo electrónico y abre el enlace que te mandamos",
							footer: "Revisa tu bandeja de entrada (incluyendo la de SPAM)."
						});
					</script>
					';
				}
				else{
					echo '<script>
					var siVibra= "vibrate" in navigator;
					if(siVibra){
						navigator.vibrate(200);
					}
					var notificacion = new Audio("vistas/audio/notificacion_error.mp3");
					notificacion.play();
					Swal.fire({
							icon: "error",
							timer: 5000,
							timerProgressBar: true,
							title: "Usuario y/o contraseña inválidos"
						});
					</script>
					';
				}
			}

		}

		// Método que recibe los valores de verificar_contra.php
		static public function verificarContraController(){

			if(!empty($_SESSION['id_usuario']) && !empty($_POST['contra'])){

				$datos = array('valor_id'=>$_SESSION['id_usuario'], 'valor_contra'=>$_POST['contra']);

				$respuesta = Model::verificarContraModelo($datos, "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
						(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.load();
							notificacion.play();

							if("webkitAudioContext" in window) {

							    var myAudioContext = new webkitAudioContext();

							}

							const a = await Swal.fire({
								icon: "success",
								title: "La contraseña es correcta",
								text: "Listo '.$_SESSION["usuario"].', ya puedes cambiar cambiar tu contraseña 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=cambiar_contra";
							}

							})()
						
						</script>';
				}
				else{
					echo '<script>
					Swal.fire({
							icon: "error",
							timer: 5000,
							timerProgressBar: true,
							title: "La contraseña es inválida"
						});
					</script>
					';
				}
			}

		}

		// Método que recibe los valores de contra.php
		static public function cambiarContraController(){

			if(!empty($_SESSION['id_usuario']) && !empty($_POST['contra'])){

				$datos = array('valor_id'=>$_SESSION['id_usuario'], 'valor_contra'=>$_POST['contra']);

				$respuesta = Model::cambiarContraModelo($datos, "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
						(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La nueva contraseña ha sido establecida con éxito 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_perfil";
							}

							})()
						
						</script>';
				}
				else if($respuesta == "existe"){
					echo '<script>
					Swal.fire({
							icon: "info",
							timer: 5000,
							timerProgressBar: true,
							title: "La nueva contraseña es igual a la antigua",
							text: "Escribe una diferente"
						});
					</script>
					';
				}
				else{
					echo '<script>
					Swal.fire({
							icon: "error",
							timer: 5000,
							timerProgressBar: true,
							title: "¡Ups! ocurrió un error al cambiar tu contraseña"
						});
					</script>
					';
				}
			}

		}

		// Método que verifica que siga existiendo el perfil mientras se navega
		static public function verificarExistenciaPerfilController(){

			if(!empty($_SESSION['id_usuario'])){

				$respuesta = Model::vistaPerfilModelo($_SESSION['id_usuario'], "usuario");
				
				if(!empty($respuesta)){
					
				}
				else{
					session_destroy();
			        echo '<script>
			            (async () => {
			              const a = await Swal.fire({
			                icon: "error",
			                timer: 4000,
			                timerProgressBar: true,
			                title: "Pal lobby",
			                text: "Ha sido baneado de nuestros servidores",
			                footer: "Presione OK para cerrar esta alerta o espere."
			              });
			                    
			              if(a){
			                window.location="index.php?opcion=login";
			              }

			            })()
			                  
			          </script>';
				}
				
			}

		}

		// Método para mostrar el perfil con el ID del usuario
		static public function verPerfilController(){

			if(!empty($_SESSION['id_usuario'])){

				$respuesta = Model::vistaPerfilModelo($_SESSION['id_usuario'], "usuario");
				
				if(!empty($respuesta)){
					foreach($respuesta as $renglon => $dato){
						?>
						<table style="white-space: nowrap; width: 100%;">

							<tr>
									<center><img src="vistas/img/menu/user.png" alt="Logo Usuario" width="100vw" style="margin-top: 25px;"></center><button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_foto_perfil';" title="Editar foto de perfil">Editar</button>

							</tr>

							<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

							<tr>

								<td>
									<label for="nombre"><b>Nombre:</b></label>
							        <div name="nombre">
							        	<?php echo $dato['nombre']; ?>
							        </div>
							    </td>
							    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							    <td>
							        <button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_nombre';" title="Editar nombre">Editar</button>
							    </td>

							</tr>

							<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Apellidos:</b></label>
						        	<div name="apellidos"><?php echo $dato['apellidos']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_apellidos';" title="Editar apellidos">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Celular:</b></label>
						        	<div name="apellidos"><?php echo $dato['celular']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_celular';" title="Editar celular">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Localidad:</b></label>
						        	<div name="apellidos"><?php echo $dato['localidad']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_localidad';" title="Editar localidad">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Estado:</b></label>
						        	<div name="apellidos"><?php echo $dato['estado']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_estado';" title="Editar estado">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Domicilio:</b></label>
						        	<div name="apellidos"><?php echo $dato['domicilio']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_domicilio';" title="Editar domicilio">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
						        	<label for="apellidos"><b>Código Postal (CP):</b></label>
						        	<div name="apellidos"><?php echo $dato['cp']; ?></div>
						        </td>
						        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						        <td>
						        	<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_cp';" title="Editar código postal">Editar</button>
						        </td>
						    </tr>

						    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

						    <tr>
						    	<td>
							        <label for="contra"><b>Contraseña:</b></label>
							        <div name="contra">********</div>
						    	</td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    	<td>
						    		<button type="button" style="border-radius: 17px;" class="btn btn-primary" onclick="window.location.href='index.php?opcion=verificar_contra';" title="Editar contraseña">Editar</button>
						    	</td>
						    </tr>
					    </table>
					    <?php
					}
				}
				else{

				}
				
			}

		}

		// Método que recibe los valores de cambiar_nombre
		static public function cambiarNombreController(){

			if(isset($_POST['nombre'])){

				if(!empty($_SESSION['usuario']) && !empty($_POST['nombre'])){

					$respuesta = Model::cambiarNombreModelo($_SESSION['id_usuario'], $_POST['nombre'], "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El nombre: '.$_POST['nombre'].', ha sido establecido con éxito 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_perfil";
							}

							})()
							</script>';

					}
					else if($respuesta == "esigual"){

						echo '<script>
							Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Usted ya tiene ese nombre",
								text: "Ingrese un nuevo nombre",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
							</script>';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al cambiar el nombre:<br>",
								text: "'.$_SESSION['usuario'].'"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de cambiar_apellidos
		static public function cambiarApellidosController(){

			if(isset($_POST['apellidos'])){

				if(!empty($_SESSION['usuario']) && !empty($_POST['apellidos'])){

					$respuesta = Model::cambiarApellidosModelo($_SESSION['id_usuario'], $_POST['apellidos'], "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "Los apellidos: '.$_POST['apellidos'].', han sido establecidos con éxito 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_perfil";
							}

							})()
							</script>';

					}
					else if($respuesta == 'esigual'){

						echo '<script>
							Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Usted ya tiene esos apellidos",
								text: "Ingrese unos apellidos diferentes",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
							</script>';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al cambiar los apellidos:<br>",
								text: "'.$_SESSION['apellidos'].'"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe el correo de la contraseña olvidada
		static public function olvidadaController(){

			if(!empty($_POST['corre'])){

				$respuesta = Model::olvidadaModelo($_POST['corre'], "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
					window.location="index.php?opcion=principal";
					</script>
					';
				}
				else if($respuesta == "no"){
					echo '<script>
					Swal.fire({
							icon: "info",
							timer: 5000,
							timerProgressBar: true,
							title: "Porfavor verifica tu cuenta",
							text: "Ve a tu correo electrónico y abre el enlace que te mandamos",
							footer: "Revisa tu bandeja de entrada (incluyendo la de SPAM)."
						});
					</script>
					';
				}
				else{
					echo '<script>
					Swal.fire({
							icon: "error",
							timer: 5000,
							timerProgressBar: true,
							title: "Usuario y/o contraseña inválidos"
						});
					</script>
					';
				}
			}

		}

		// Método que recibe los valores del registro de un producto
		static public function registrarProductoController(){

			if(isset($_POST['categoria'])){

				if(!empty($_POST['categoria']) && !empty($_POST['marca']) && !empty($_POST['proveedor']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio_compra']) && !empty($_POST['precio_venta'])){

					// Creación del Arreglo
					$datos = array("valor_categoria"=>$_POST['categoria'], "valor_marca"=>$_POST['marca'], "valor_imei"=>$_POST['imei'], "valor_proveedor"=>$_POST['proveedor'], "valor_nombre_producto"=>$_POST['nombre'], "valor_almacenamiento"=>$_POST['almacenamiento'], "valor_descripcion"=>$_POST['descripcion'], "valor_precio_compra"=>$_POST['precio_compra'], "valor_precio_venta"=>$_POST['precio_venta']);

					$respuesta = Model::registrarProductoModelo($datos, "producto");
					
					if($respuesta == "ok"){
						echo '<script>
								(async () => {
								var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
								notificacion.play();
								const a = await Swal.fire({
									icon: "success",
									title: "El producto: '.$_POST['nombre'].', fue registrado con éxito 😄👍",
									footer: "Presiona OK para continuar."
								});
								
								if(a){
									window.location="index.php?opcion=registrar_producto";
								}

								})()
						</script>';
					}
					else if($respuesta == "existe"){

							echo '<script>
							Swal.fire({
									icon: "info",
									timer: 5000,
									timerProgressBar: true,
									title: "El producto con el imei: '.$_POST['imei'].' ya existe",
									text: "Ingrese un producto con un IMEI diferente",
									footer: "Este mensaje cerrará automáticamente en 5s."
								});
							</script>
							';

					}
					else{

							echo '<script>
							Swal.fire({
									icon: "error",
									timer: 5000,
									timerProgressBar: true,
									title: "Ups!😢<br> Ocurrió un error al registrar el producto:<br>",
									text: "'.$_POST['nombre'].'"
								});
							</script>
							';

					}

				}
				else{

						echo '<script>
								Swal.fire({
									icon: "warning",
									timer: 5000,
									timerProgressBar: true,
									title: "Porfavor llene todos los campos del formulario"
								});
							</script>
							';
						
				}

			}

		}

		// Método que recibe los valores de registrar_categoria
		static public function registrarCategoriaController(){

			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre'])){

					$respuesta = Model::registrarCategoriaModelo($_POST['nombre'], "categoria");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					notificacion.play();
							const a = await Swal.fire({
									icon: "success",
									title: "La categoría: '.$_POST['nombre'].', fue registrada con éxito 😄👍",
									text: "Puedes agregar las categorías que quieras",
									footer: "Presiona OK para continuar."
							});

							if(a){
								window.location="index.php?opcion=registrar_categoria";
							}

							})()
							</script>';

					}
					else if($respuesta == "existe"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La categoría: '.$_POST['nombre'].', ya existe",
								text: "Ingresa otra categoría o modifica la existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al registrar la categoría:<br>",
								text: "'.$_POST['nombre'].'"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de editar_categoria.php
		static public function editarCategoriaController($categoria){

			if(isset($_POST['nvoNombre'])){

				if(!empty($_POST['nvoNombre'])){

					$datos = array('valor_categoria'=>$categoria, 'valor_nvoNombre'=>$_POST['nvoNombre']);

					$respuesta = Model::editarCategoriaModelo($datos, "categoria");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La categoría fue modificada con éxito 😄👍",
								html: "La categoría <b>'.$categoria.'</b>, fue renombrada como: <b>'.$_POST['nvoNombre'].'</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_categorias";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La categoría: '.$categoria.', no existe",
								text: "Ingrese una categoría existe",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La categoría ya tiene ese nombre",
								text: "Ingrese un nuevo nombre para la categoría",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar la categoría:",
								html: "<b>'.$categoria.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de eliminar_categoria.php
		static public function eliminarCategoriaController($categoria){

			if(isset($categoria)){

				if(!empty($categoria)){

					$respuesta = Model::eliminarCategoriaModelo($categoria, "categoria");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La categoría fue eliminada con éxito 😄👍",
								html: "La categoría <b>'.$categoria.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_categorias";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La categoría: '.$categoria.', no existe",
								text: "Ingrese una categoría existe",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar la categoría:",
								html: "<b>'.$categoria.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese una categoria"
							});
						</script>
						';
					
				}

			}
		}

		// Método para mostrar las categorias de la bd
		static public function vistaCategorias(){

				$respuesta = Model::vistaCategoriasModelo("categoria");
				?>
				<div style="margin-left: 3%; margin-right: 3%; box-shadow: 0px 0px 30px 1px black; border-radius: 10px; border: none;">
					<div class="table-responsive" style="padding: 1%;">
						<table id="tablaCategoria" class="table table-hover table-sm" style="white-space: nowrap;">
							<button class="btn btn-primary" id="btn-agregar" onclick="window.location='index.php?opcion=registrar_categoria'" style="margin-bottom: 10px;" title="Agregar categoría">Agregar categoría</button><br>
							<thead>
								<th scope="col">CATEGORÍA</th>
								<th scope="col">FECHA DE CREACIÓN</th>
								<th>ÚLTIMA MODIFICACIÓN</th>
								<th></th>
							</thead>
							<tbody>
				<?php
				foreach($respuesta as $renglon => $dato){
				?>
								<tr>
								<td><?php echo $dato['nombre_categoria']; ?></td>
								<td><?php echo $dato['fecha']." ".$dato['hora']; ?></td>
								<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
									echo 'Sin modificaciones';
								}else{
										echo $dato['fecha_modificacion']." ".$dato['hora_modificacion'];
									} ?></td>
								<td><button class="btn btn-warning" onclick="window.location='index.php?opcion=editar_categoria&categoria=<?php echo $dato['nombre_categoria']; ?>'">Editar</button> <button class="btn btn-danger" onclick="confirmar('<?php echo $dato['nombre_categoria']; ?>')">🗑️</button></td>
								</tr>
				<?php
				}
				?>
							</tbody>
						</table>
					</div>
				</div><br>
				<script type="text/javascript">
					function confirmar(categoria){
						Swal.fire({
						  title: 'Estás seguro?',
						  html: "Se eliminará la categoria: <b>"+categoria+"</b>",
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: "Cancelar",
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Si, eliminar!'
						}).then((result) => {
						  if (result.value) {
						    window.location="index.php?opcion=eliminar_categoria&categoria="+categoria;
						  }
						})
					};
				</script>
				<script type="text/javascript">
					var currentDate = new Date()
					var day = currentDate.getDate()
					var month = currentDate.getMonth() + 1
					var year = currentDate.getFullYear()

					var fecha = day + "-" + month + "-" + year;
				    $(document).ready(function(){
				    	$('#tablaCategoria').DataTable({

				    		dom: 'Bfrtilp',
				        	buttons:[
				        	{
								extend:    'copyHtml5',
								text:      'Copiar',
								titleAttr: 'Copiar',
								title: "Categorías Existentes ("+fecha+")",
								exportOptions: {
                    				columns: [ 0, 1, 2 ]
                				}
							},
							{
								extend:    'csvHtml5',
								text:      'CSV',
								titleAttr: 'Exportar en CSV',
								filename: "Categorías existentes ("+fecha+")",
								charset: "utf-8",
								bom: "true",
								exportOptions: {
                    				columns: [ 0, 1, 2 ]
                				}
							},
							{
								extend:    'excelHtml5',
								text:      '<span class="icon-file-excel" style="font-size: 1.7em; color: green;">',
								titleAttr: 'Exportar a Excel',
								className: 'btn btn-success',
								filename: "Categorías existentes ("+fecha+")", 
								sheetName: 'Categorías', 
								title: "Categorías Existentes ("+fecha+")",
								exportOptions: {
                    				columns: [ 0, 1, 2 ]
                				}
							},
							{
								extend:    'pdfHtml5',
								text:      '<span class="icon-file-pdf" style="font-size: 1.7em; color: red;">',
								titleAttr: 'Exportar a PDF',
								filename: "Categorías existentes ("+fecha+")",
								title: "Categorías Existentes ("+fecha+")",
								exportOptions: {
                    				columns: [ 0, 1, 2 ]
                				},
                				customize: function(doc) {
						        	//pageMargins [left, top, right, bottom] 
						        	doc.pageMargins = [ 144, 20, 144, 20 ];
						        	doc.styles.title = {
						        		bold: true,
								    	color: 'black',
								    	fontSize: '15',
								    	alignment: 'center'
									}
						       	}
							},
							{
								extend:    'print',
								text:      '<span class="icon-printer" style="font-size: 1.7em;">',
								titleAttr: 'Imprimir',
								filename: "Categorías existentes ("+fecha+")",
								title: "Categorías Existentes ("+fecha+")",
								exportOptions: {
                    				columns: [ 0, 1, 2 ]
                				}
							},
						],

				    		language: {

							    "sProcessing":     "Procesando...",
							    "sLengthMenu":     "Mostrar _MENU_ registros",
							    "sZeroRecords":    "No se encontraron resultados",
							    "sEmptyTable":     "Ningún dato disponible en esta tabla",
							    "sInfo":           "Mostrando registros del <b>_START_</b> al <b>_END_</b> de un total de <b>_TOTAL_</b> registros",
							    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
							    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
							    "sInfoPostFix":    "",
							    "sSearch":         "<b>Buscar:</b>",
							    "sUrl":            "",
							    "sInfoThousands":  ",",
							    "sLoadingRecords": "Cargando...",
							    "oPaginate": {
							        "sFirst":    "Primero",
							        "sLast":     "Último",
							        "sNext":     "Siguiente",
							        "sPrevious": "Anterior"
							    },
							    "oAria": {
							        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
							    },
							    "buttons": {
							        "copy": "Copiar",
							        "copyTitle": 'Copiado al portapapeles',
									"copySuccess": "%d filas copiadas al portapapeles",
							        "colvis": "Visibilidad"
							    }

				    		}

				    	});

					});
				</script>
				<center>
					<img src="vistas/img/deslizar.png" width="40px">
				</center><br>
				<?php 
		}

		// Método para mostrar las categorias en un select
		static public function vistaSelectCategorias(){

			$respuesta = Model::vistaCategoriasSelectModelo("categoria");
			foreach($respuesta as $renglon => $dato){
				?> 
				<option value="<?php echo $dato['nombre_categoria']; ?>" onclick="seleccion();"><?php echo $dato['nombre_categoria']; ?></option>
				<?php 
			}
		}

		// Método que recibe los valores de registrar_marca
		static public function registrarMarcaController(){

			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre'])){

					$respuesta = Model::registrarMarcaModelo($_POST['nombre'], "marca");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
									icon: "success",
									title: "La marca: '.$_POST['nombre'].', fue registrada con éxito 😄👍",
									text: "Puedes agregar las marcas que quieras",
									footer: "Presiona OK para continuar."
							});

							if(a){
								window.location="index.php?opcion=registrar_marca";
							}

							})()
							</script>';

					}
					else if($respuesta == "existe"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca: '.$_POST['nombre'].', ya existe",
								text: "Ingresa otra marca o modifica la existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al registrar la marca:<br>",
								text: "'.$_POST['nombre'].'"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método para mostrar las marcas de la bd
		static public function vistaMarcas(){

			$respuesta = Model::vistaMarcasModelo("marca");
			foreach($respuesta as $renglon => $dato){
				?> 
				<tr>
					<td><?php echo $dato['nombre_marca']; ?></td>
					<td><?php echo $dato['fecha']." ".$dato['hora']; ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." ".$dato['hora_modificacion'];
					} ?></td>
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?opcion=editar_marca&marca=<?php echo $dato['nombre_marca']; ?>'">Editar</button> <button class="btn btn-danger" onclick="confirmar('<?php echo $dato['nombre_marca']; ?>')">🗑️</button></td>
				</tr>
				<?php 
			}
		}

		// Método que recibe los valores de editar_marca.php
		static public function editarMarcaController($marca){

			if(isset($_POST['nvoNombre'])){

				if(!empty($_POST['nvoNombre'])){

					$datos = array('valor_marca'=>$marca, 'valor_nvoNombre'=>$_POST['nvoNombre']);

					$respuesta = Model::editarMarcaModelo($datos, "marca");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La marca fue modificada con éxito 😄👍",
								html: "La marca <b>'.$marca.'</b>, fue renombrada como: <b>'.$_POST['nvoNombre'].'</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_marcas";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca: '.$marca.', no existe",
								text: "Ingrese una marca existe",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca ya tiene ese nombre",
								text: "Ingrese un nuevo nombre para la marca",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar la marca:",
								html: "<b>'.$marca.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de eliminar_marca.php
		static public function eliminarMarcaController($marca){

			if(isset($marca)){

				if(!empty($marca)){

					$respuesta = Model::eliminarMarcaModelo($marca, "marca");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La marca fue eliminada con éxito 😄👍",
								html: "La marca <b>'.$marca.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_marcas";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca: '.$marca.', no existe",
								text: "Ingrese una marca existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar la marca:",
								html: "<b>'.$marca.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese una marca"
							});
						</script>
						';
					
				}

			}
		}

		// Método para mostrar las marcas en un select
		static public function vistaSelectMarcas(){

			$respuesta = Model::vistaMarcasSelectModelo("marca");
			foreach($respuesta as $renglon => $dato){
				?> 
				<option value="<?php echo $dato['nombre_marca']; ?>" <?php if(isset($_POST['marca']) && $_POST['marca'] == $dato['nombre_marca']){
					echo 'selected="selected"';
				} ?>><?php echo $dato['nombre_marca']; ?></option>
				<?php 
			}
		}

		// Método que recibe los valores de registrar_proveedor
		static public function registrarProveedorController(){

			if(isset($_POST['nombre'])){

				if((!empty($_POST['nombre'])) && (!empty($_POST['apellidos'])) && (!empty($_POST['locali'])) && (!empty($_POST['tel']))){

					$datos = array('valor_nombre'=>$_POST['nombre'], 'valor_apellidos'=>$_POST['apellidos'], 'valor_localidad'=>$_POST['locali'], 'valor_telefono'=>$_POST['tel']);

					$respuesta = Model::registrarProveedorModelo($datos, "proveedor");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
									icon: "success",
									title: "El proveedor: '.$_POST['nombre'].' '.$_POST['apellidos'].', fue registrado con éxito 😄👍",
									text: "Puedes agregar los proveedores que quieras",
									footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=registrar_proveedor";
							}

							})()
							</script>';

					}
					else if($respuesta == "existe"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor: '.$_POST['nombre'].' '.$_POST['apellidos'].', ya existe",
								text: "Ingresa otro nombre o modifica el proveedor existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al registrar el proveedor:<br>",
								text: "'.$_POST['nombre'].' '.$_POST['apellidos'].'"
							});
						</script>
						';

					}

				}else{

					echo '<script>
						Swal.fire({
							icon: "warning",
							timer: 5000,
							timerProgressBar: true,
							title: "Porfavor llene todos los campos del formulario"
						});
						</script>';
						
					}

			}

		}

		// Método para mostrar los proveedores de la BD
		static public function vistaProveedores(){

			$respuesta = Model::vistaProveedoresModelo("proveedor");
			foreach($respuesta as $renglon => $dato){
				?> 
				<tr>
					<td><?php echo $dato['id_proveedor']; ?></td>
					<td><?php echo $dato['nombre_proveedor'].' '.$dato['apellidos_proveedor']; ?></td>
					<td><?php echo $dato['localidad_proveedor'] ?></td>
					<td><?php echo $dato['celular_proveedor'] ?></td>
					<td><?php echo $dato['fecha_registro']." ".$dato['hora_registro']; ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." ".$dato['hora_modificacion'];
					} ?></td>
					<td><button class="btn btn-warning" onclick="window.location='index.php?opcion=editar_proveedor&nombre=<?php echo $dato['nombre_proveedor']; ?>&apellidos=<?php echo $dato['apellidos_proveedor']; ?>&locali=<?php echo $dato['localidad_proveedor']; ?>&id_proveedor=<?php echo $dato['id_proveedor']; ?>&celular_proveedor=<?php echo $dato['celular_proveedor']; ?>'">Editar</button> <button class="btn btn-danger" onclick="confirmar1('<?php echo $dato['id_proveedor']; ?>', '<?php echo $dato['nombre_proveedor']; ?>', '<?php echo $dato['apellidos_proveedor']; ?>')">🗑️</button></td>
				</tr>
				<?php 
			}
		}

		// Método que recibe los valores de editar_proveedor.php
		static public function editarProveedorController($idProveedor, $nombreProveedor, $apellidosProveedor, $localidadProveedor, $telProveedor){

			if(isset($_POST['nvoNombre'])){

				if(!empty($_POST['nvoNombre'])){

					$datos = array('valor_idProveedor'=>$idProveedor, 'valor_nombreProveedor'=>$nombreProveedor, 'valor_apellidosProveedor'=>$apellidosProveedor, 'valor_localidadProveedor'=>$localidadProveedor, 'valor_telProveedor'=>$telProveedor, 'valor_nvoNombre'=>$_POST['nvoNombre'], 'valor_nvosApellidos'=>$_POST['nvosApellidos'], 'valor_nvaLocali'=>$_POST['nvaLocali'], 'valor_nvoTel'=>$_POST['nvoTel']);

					$respuesta = Model::editarProveedorModelo($datos, "proveedor");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El proveedor fue modificado con éxito 😄👍",
								html: "El proveedor <b>'.$nombreProveedor.' '.$apellidosProveedor.'</b>, fue modificado correctamente</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_proveedores";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor con el #ID: '.$idProveedor.', no existe",
								text: "Ingrese un proveedor existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Modifique almenos un campo del proveedor",
								text: "Ingrese nueva información del proveedor",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar al proveedor:",
								html: "<b>'.$nombreProveedor.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de eliminar_proveedor.php
		static public function eliminarProveedorController($idProveedor, $nombreProveedor, $apellidosProveedor){

			if(isset($idProveedor)){

				if(!empty($idProveedor)){

					$respuesta = Model::eliminarProveedorModelo($idProveedor, "proveedor");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El proveedor fue eliminado con éxito 😄👍",
								html: "El proveedor <b>'.$nombreProveedor.' '.$apellidosProveedor.'</b>, fue eliminado",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_proveedores";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor con el #ID: '.$idProveedor.', no existe",
								text: "Ingrese un proveedor existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar el proveedor:",
								html: "<b>'.$nombreProveedor.' '.$apellidosProveedor.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese un proveedor"
							});
						</script>
						';
					
				}

			}
		}

		// Método para mostrar los proveedores en un select
		static public function vistaSelectProveedores(){

			$respuesta = Model::vistaProveedoresSelectModelo("proveedor");
			foreach($respuesta as $renglon => $dato){
				?> 
				<option value="<?php echo $dato['id_proveedor']; ?>" <?php if(isset($_POST['proveedor']) && $_POST['proveedor'] == $dato['id_proveedor']){
					echo 'selected="selected"';
				} ?>><?php echo $dato['nombre_proveedor'].' '.$dato['apellidos_proveedor']; ?></option>
				<?php 
			}
		}

		// Método que recibe los valores del formulario de registro
		static public function registroManualController(){
			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre']) && !empty($_POST['ape']) && !empty($_POST['sexo']) && !empty($_POST['fecha_nac']) && !empty($_POST['tel']) && !empty($_POST['locali']) && !empty($_POST['estado']) && !empty($_POST['domic']) && !empty($_POST['cp']) && !empty($_POST['corre']) && !empty($_POST['contra']) && !empty($_POST['rol'])){

					$datos = array('valor_nombre'=>$_POST['nombre'], 'valor_apellidos'=>$_POST['ape'], 'valor_sexo'=>$_POST['sexo'], 'valor_fecha_nacimiento'=>$_POST['fecha_nac'], 'valor_telefono'=>$_POST['tel'], 'valor_localidad'=>$_POST['locali'], 'valor_estado'=>$_POST['estado'], 'valor_domicilio'=>$_POST['domic'], 'valor_cp'=>$_POST['cp'], 'valor_correo'=>$_POST['corre'], 'valor_contra'=>$_POST['contra'], 'valor_rol'=>$_POST['rol']);

					$respuesta = Model::registroManualModelo($datos, "usuario");
					
					if($respuesta == "ok"){
						echo '<script>
						(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								timer: 5000,
								timerProgressBar: true,
								title: "Usuario registrado con éxito",
								footer: "Redireccionando a la vista de usuarios."
							});
							
							if(a){
								window.location="index.php?opcion=ver_usuarios";
							}

							})()
						
						</script>
						';
					}
					else if($respuesta == "no"){
						echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Pruebe con otro correo electrónico porfavor"
							});
						</script>
						';
					}
					else{
						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups! Ocurrió un error al registrar al usuario"
							});
						window.location="index.php?opcion=registro_manual";
						</script>
						';
					}
				}
				else{
					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
				}
			}
		}

		// Método para mostrar los usuarios de la BD
		static public function vistaUsuarios(){

			$respuesta = Model::vistaUsuariosModelo("usuario");
			foreach($respuesta as $renglon => $dato){
				?> 
				<tr>
					<td><?php echo $dato['id_user']; ?></td>
					<td><?php echo $dato['nombre']; ?></td>
					<td><?php echo $dato['apellidos']; ?></td>
					<td><?php echo $dato['sexo']; ?></td>
					<td><?php echo $dato['fecha_nac']; ?></td>
					<td><?php echo $dato['celular']; ?></td>
					<td><?php echo $dato['localidad']; ?></td>
					<td><?php echo $dato['estado']; ?></td>
					<td><?php echo $dato['domicilio']; ?></td>
					<td><?php echo $dato['cp']; ?></td>
					<td><?php echo $dato['correo']; ?></td>
					<td><?php echo $dato['contra']; ?></td>
					<td><?php echo $dato['status']; ?></td>
					<td><?php echo $dato['num_rol']; ?></td>
					<td><?php echo $dato['fecha']." ".$dato['hora']; ?></td>
					<td><?php echo $dato['fecha_confirmacion']." ".$dato['hora_confirmacion']; ?></td>
					<td><?php if(($dato['fecha_ultima_sesion'] == NULL) && ($dato['hora_ultima_sesion'] == NULL)){
						echo 'Nunca ha iniciado sesión';
					}else{
						echo $dato['fecha_ultima_sesion']." ".$dato['hora_ultima_sesion'];
					} ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." ".$dato['hora_modificacion'];
					} ?></td>
					<td style="text-align: right;"><?php if($dato['fecha_confirmacion'] == "0000-00-00" || $dato['hora_confirmacion'] == "00:00"){
						echo '<button class="btn btn-primary" title="Enviar correo de confirmación">📩</button> ';
					} ?>
					<button class="btn btn-dark" title="Ver perfil" onclick="window.location='index.php?opcion=info_usuario&nombre=<?php echo $dato['nombre'].'&apellidos='.$dato['apellidos'].'&sexo='.$dato['sexo'].'&fecha_nac='.$dato['fecha_nac'].'&celular='.$dato['celular'].'&localidad='.$dato['localidad'].'&estado='.$dato['estado'].'&domicilio='.urlencode($dato['domicilio']).'&cp='.$dato['cp'].'&id_usuario='.$dato['id_user'].'&correo='.$dato['correo'].'&contra='.$dato['contra'].'&status='.$dato['status'].'&num_rol='.$dato['num_rol'].'&fecha='.$dato['fecha'].'&hora='.$dato['hora'].'&fecha_confirmacion='.$dato['fecha_confirmacion'].'&hora_confirmacion='.$dato['hora_confirmacion'].'&fecha_ultima_sesion='.$dato['fecha_ultima_sesion'].'&hora_ultima_sesion='.$dato['hora_ultima_sesion'].'&fecha_modificacion='.$dato['fecha_modificacion'].'&hora_modificacion='.$dato['hora_modificacion']; ?>'">Ver perfil</button> <button class="btn btn-warning" onclick="window.location='index.php?opcion=editar_usuario&nombre=<?php echo $dato['nombre'].'&apellidos='.$dato['apellidos'].'&sexo='.$dato['sexo'].'&fecha_nac='.$dato['fecha_nac'].'&celular='.$dato['celular'].'&localidad='.$dato['localidad'].'&estado='.$dato['estado'].'&domicilio='.urlencode($dato['domicilio']).'&cp='.$dato['cp'].'&id_usuario='.$dato['id_user'].'&correo='.$dato['correo'].'&status='.$dato['status'].'&num_rol='.$dato['num_rol'].'&fecha='.$dato['fecha'].'&hora='.$dato['hora'].'&fecha_confirmacion='.$dato['fecha_confirmacion'].'&hora_confirmacion='.$dato['hora_confirmacion']; ?>'" title="Editar">Editar</button> <button class="btn btn-danger" onclick="confirmar2('<?php echo $dato['id_user']; ?>', '<?php echo $dato['nombre']; ?>', '<?php echo $dato['apellidos']; ?>', '<?php echo $dato['correo']; ?>')" title="Eliminar">🗑️</button></td>
				</tr>
				<?php 
			}
		}

		// Método que recibe los valores de editar_usuario.php
		static public function editarUsuarioController($datosUsuario){

			// Valores actuales del usuario
			$idUsuario = $datosUsuario['valor_id'];
			$nombreUsuario = $datosUsuario['valor_nombre'];
			$apellidosUsuario = $datosUsuario['valor_apellidos'];
			$sexoUsuario = $datosUsuario['valor_sexo'];
			$fechaNacUsuario = $datosUsuario['valor_fecha_nac'];
			$celularUsuario = $datosUsuario['valor_celular'];
			$localidadUsuario = $datosUsuario['valor_localidad'];
			$estadoUsuario = $datosUsuario['valor_estado'];
			$domicilioUsuario = $datosUsuario['valor_domicilio'];
			$cpUsuario = $datosUsuario['valor_cp'];
			$correoUsuario = $datosUsuario['valor_correo'];
			$statusUsuario = $datosUsuario['valor_status'];
			$rolUsuario = $datosUsuario['valor_num_rol'];
			$fechaConfirmacionUsuario = $datosUsuario['valor_fecha_confirmacion'];
			$horaConfirmacionUsuario = $datosUsuario['valor_hora_confirmacion'];


			if(isset($_POST['nvoNombre']) && isset($_POST['nvosApellidos']) && isset($_POST['nvoSexo']) && isset($_POST['nvaFecha_nac']) && isset($_POST['nvoTel']) && isset($_POST['nvaLocali']) && isset($_POST['nvoEstado']) && isset($_POST['nvoDomic']) && isset($_POST['nvoCp']) && isset($_POST['nvoCorre']) && isset($_POST['nvaContra']) && isset($_POST['nvoStatus']) && isset($_POST['nvoRol']) && isset($_POST['nvaFecha_confirmacion']) && isset($_POST['nvaHora_confirmacion'])){

				if(!empty($_POST['nvoNombre']) && !empty($_POST['nvosApellidos']) && !empty($_POST['nvoSexo']) && !empty($_POST['nvaFecha_nac']) && !empty($_POST['nvoTel']) && !empty($_POST['nvaLocali']) && !empty($_POST['nvoEstado']) && !empty($_POST['nvoDomic']) && !empty($_POST['nvoCp']) && !empty($_POST['nvoCorre']) && !empty($_POST['nvaContra']) && !empty($_POST['nvoStatus']) && !empty($_POST['nvoRol']) && !empty($_POST['nvaFecha_confirmacion']) && !empty($_POST['nvaHora_confirmacion'])){

					$datos = array('valor_id'=>$idUsuario,'valor_nombre'=>$nombreUsuario, 'valor_apellidos'=>$apellidosUsuario, 'valor_sexo'=>$sexoUsuario, 'valor_fecha_nac'=>$fechaNacUsuario, 'valor_celular'=>$celularUsuario, 'valor_localidad'=>$localidadUsuario, 'valor_estado'=>$estadoUsuario, 'valor_domicilio'=>$domicilioUsuario, 'valor_cp'=>$cpUsuario, 'valor_correo'=>$correoUsuario, 'valor_status'=>$statusUsuario, 'valor_num_rol'=>$rolUsuario, 'valor_fecha_confirmacion'=>$fechaConfirmacionUsuario, 'valor_hora_confirmacion'=>$horaConfirmacionUsuario, 'valor_nvoNombre'=>$_POST['nvoNombre'], 'valor_nvosApellidos'=>$_POST['nvosApellidos'], 'valor_nvoSexo'=>$_POST['nvoSexo'], 'valor_nvaFecha_nac'=>$_POST['nvaFecha_nac'], 'valor_nvoTel'=>$_POST['nvoTel'], 'valor_nvaLocali'=>$_POST['nvaLocali'], 'valor_nvoEstado'=>$_POST['nvoEstado'], 'valor_nvoDomic'=>$_POST['nvoDomic'], 'valor_nvoCp'=>$_POST['nvoCp'], 'valor_nvoCorre'=>$_POST['nvoCorre'], 'valor_nvaContra'=>$_POST['nvaContra'], 'valor_nvoStatus'=>$_POST['nvoStatus'], 'valor_nvoRol'=>$_POST['nvoRol'], 'valor_nvaFecha_confirmacion'=>$_POST['nvaFecha_confirmacion'], 'valor_nvaHora_confirmacion'=>$_POST['nvaHora_confirmacion']);

					$respuesta = Model::editarUsuarioModelo($datos, "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El usuario fue modificado con éxito 😄👍",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_usuarios";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El usuario: '.$nombreUsuario.' '.$apellidosUsuario.', no existe",
								text: "Ingrese un usuario existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Modifique por lo menos un campo del usuario",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar el usuario:",
								html: "<b>'.$nombreUsuario.' '.$apellidosUsuario.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}

		// Método que recibe los valores de eliminar_usuario.php
		static public function eliminarUsuarioController($idUsuario, $nombreUsuario, $apellidosUsuario, $correoUsuario){

			if(isset($idUsuario) && isset($nombreUsuario) && isset($apellidosUsuario) && isset($correoUsuario)){

				if(!empty($idUsuario) && !empty($nombreUsuario) && !empty($apellidosUsuario) && !empty($correoUsuario)){

					$datos = array('valor_idUsuario'=>$idUsuario, 'valor_nombreUsuario'=>$nombreUsuario, 'valor_apellidosUsuario'=>$apellidosUsuario, 'valor_correoUsuario'=>$correoUsuario);

					$respuesta = Model::eliminarUsuarioModelo($datos, "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El usuario fue eliminado con éxito 😄👍",
								html: "El usuario: <b>'.$nombreUsuario.' '.$apellidosUsuario.'</b><br>Correo: <b>'.$correoUsuario.'</b><br> fue eliminado",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_usuarios";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El usuario: '.$nombreUsuario.' '.$apellidosUsuario.'<br>Correo: '.$correoUsuario.'<br> no existe",
								text: "Ingrese un usuario existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar al <br>usuario:",
								html: "<b>'.$nombreUsuario.' '.$apellidosUsuario.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese la información del usuario"
							});
						</script>
						';
					
				}

			}
		}

		// Método para mostrar los productos de la BD
		static public function vistaProductos(){

			$respuesta = Model::vistaProductosModelo("producto");
			foreach($respuesta as $renglon => $dato){
				?> 
				<tr>
					<td><?php echo $dato['id_producto']; ?></td>
					<td><?php echo $dato['fk_categoria']; ?></td>
					<td><?php echo $dato['imei']; ?></td>
					<td><?php echo $dato['fk_marca']; ?></td>
					<td><?php echo $dato['fk_id_proveedor']; ?></td>
					<td><?php echo '<img src="'.$dato['ruta_imagen'].'" width="150px;">'; ?></td>
					<td><?php echo $dato['nombre_producto']; ?></td>
					<td><?php echo $dato['almacenamiento']; ?></td>
					<td><?php echo $dato['descripcion_producto']; ?></td>
					<td><?php echo '$'.$dato['costo_compra_unitario']; ?></td>
					<td><?php echo '$'.$dato['costo_venta_unitario']; ?></td>
					<td><?php echo $dato['fecha_creacion'].' '.$dato['hora_creacion']; ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." ".$dato['hora_modificacion'];
					} ?></td>
					<td style="text-align: right;"><button class="btn btn-warning" onclick="window.location='index.php?opcion=editar_producto'" title="Editar">Editar</button> <button class="btn btn-danger" onclick="confirmar3('<?php echo $dato['id_producto']; ?>', '<?php echo $dato['nombre_producto']; ?>', '<?php echo $dato['almacenamiento']; ?>', '<?php echo $dato['ruta_imagen']; ?>')" title="Eliminar">🗑️</button></td>
				</tr>
				<?php 
			}
		}

		// Método para mostrar los celulares de la BD
		static public function vistaCelulares(){

			$respuesta = Model::vistaCelularesModelo("producto", 5);
			foreach($respuesta as $renglon => $dato){
				?> 
				<a href="#" style="color: black; text-decoration: none;">
				<div>
			    <img src="<?php echo $dato['ruta_imagen']; ?>" loading="lazy" width="130px" alt="<?php echo $dato['nombre_producto']; ?>">
			    <div id="arti" class="media-body" style="width: 350px;">
			      <h3 class="mt-2"><?php echo $dato['nombre_producto'].' <button class="btn btn-outline-secondary" style="display: inline;">'.$dato['almacenamiento'].'</button>'; ?></h3>
			      <p><?php echo $dato['descripcion_producto']; ?>
			      <h3 style="color: red;">$<?php
			      $precio_f = number_format($dato['max_costo_venta_unitario'], $decimals = 2 , $dec_point = "." , $thousands_sep = "," );
			      $precio = explode(".", $precio_f); 
			      echo $precio[0]; ?><sup><?php echo '.'.$precio[1]; ?>&nbsp;
			      		<div style="color: black; display: inline-flex; font-size: 0.8em;">MXN</div></sup></h3></p>
			    </div>
			  	</div></a>
			  	<?php if($_SESSION['tipo'] == 2){ ?>
				<button type="submit" onclick="agregarCarrito('<?php echo $dato['id_producto']; ?>', '<?php echo $dato['ruta_imagen']; ?>', '<?php echo $dato['nombre_producto']; ?>', '<?php echo $dato['almacenamiento']; ?>', '<?php echo $dato['max_costo_venta_unitario']; ?>');" class="btn btn-outline-primary" style="font-size: 1.2em; border-radius: 17px;">Añadir al carrito</button></p>
			<?php }else{ } ?>
				<div class="card" style="margin-bottom: 10px;"></div>
				<script type="text/javascript">
				  function agregarCarrito(id_producto, ruta_imagen_producto, nombre_producto, almacenamiento, precio){
				            Swal.fire({
				              title: 'Desea agregar el producto?',
				              icon: 'info',
				              showCancelButton: true,
				              cancelButtonText: "Cancelar",
				              confirmButtonColor: '#3085d6',
				              cancelButtonColor: '#d33',
				              confirmButtonText: 'Si, agreagar al carrito!'
				            }).then((result) => {
				              if (result.value) {
				                var ajax = new XMLHttpRequest();
				                ajax.open('POST', 'vistas/modulos/agregar_carrito.php', true);
				                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				                ajax.onreadystatechange = function (){
				                  // Comprobar si se ejecutó correctamente
				                  if (this.readyState == 4 && this.status == 200) {

				                  	if(ajax.responseText == "yaexiste"){

				                  		(async () => {
					                    	var siVibra= "vibrate" in navigator;
											if(siVibra){
												navigator.vibrate(200);
											}
											var notificacion = new Audio("vistas/audio/notificacion_error.mp3");
											notificacion.load();
											notificacion.play();
					                      	const a = await Swal.fire({
						                        icon: "warning",
						                        timer: 4000,
						                        timerProgressBar: true,
						                        title: "Ya lo tienes agregado",
						                        text: "El producto ya ha sido agregado al carrito anteriormente",
						                        footer: "Presione OK para cerrar esta alerta o espere."
					                      	});
					                            
					                    	if(a){
					                        //window.location="index.php?opcion=celulares&pagina=1";
					                        //console.log(ajax.responseText);
					                      	}

					                    })()
				                  	}
				                  	else{
				                  		(async () => {
					                      var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					                      notificacion.play();
					                      const a = await Swal.fire({
					                        icon: "success",
					                        timer: 4000,
					                        timerProgressBar: true,
					                        title: "Producto agregado con éxito",
					                        text: "El producto se agregó al carrito de compras",
					                        footer: "Presione OK para cerrar esta alerta o espere."
					                      });
					                            
					                      if(a){
					                        window.location="index.php?opcion=celulares&pagina=1";
					                        //console.log(ajax.responseText);
					                      }

					                    })()

				                  	}
				                    
				                  }
				                }
				                ajax.send("id_producto="+id_producto+"&ruta_imagen_producto="+ruta_imagen_producto+"&nombre_producto="+nombre_producto+"&almacenamiento="+almacenamiento+"&precio_producto="+precio);
				                
				              }
				            })
				          };
				</script>
				<?php 
			}
		}

		// Método para mostrar las fundas de la BD
		static public function vistaFundas(){

			$respuesta = Model::vistaFundasModelo("producto", 5);
			foreach($respuesta as $renglon => $dato){
				?> 
				<a href="#" style="color: black; text-decoration: none;">
				<div>
			    <img src="<?php echo $dato['ruta_imagen']; ?>" loading="lazy" width="130px" alt="<?php echo $dato['nombre_producto']; ?>">
			    <div id="arti" class="media-body" style="width: 350px;">
			      <h3 class="mt-2"><?php echo $dato['nombre_producto']; ?></h3>
			      <p><?php echo $dato['descripcion_producto']; ?>
			      <h3 style="color: red;">$<?php
			      $precio_f = number_format($dato['max_costo_venta_unitario'], $decimals = 2 , $dec_point = "." , $thousands_sep = "," );
			      $precio = explode(".", $precio_f); 
			      echo $precio[0]; ?><sup><?php echo '.'.$precio[1]; ?>&nbsp;
			      		<div style="color: black; display: inline-flex; font-size: 0.8em;">MXN</div></sup></h3></p>
			    </div>
			  	</div></a>
			  	<?php if($_SESSION['tipo'] == 2){ ?>
				<button type="submit" onclick="agregarCarrito('<?php echo $dato['id_producto']; ?>', '<?php echo $dato['ruta_imagen']; ?>', '<?php echo $dato['nombre_producto']; ?>', '<?php echo $dato['almacenamiento']; ?>', '<?php echo $dato['max_costo_venta_unitario']; ?>');" class="btn btn-outline-primary" style="font-size: 1.2em; border-radius: 17px;">Añadir al carrito</button></p>
				<?php }else{ } ?>
				<div class="card" style="margin-bottom: 10px;"></div>
				<script type="text/javascript">
				  function agregarCarrito(id_producto, ruta_imagen_producto, nombre_producto, almacenamiento, precio){
				            Swal.fire({
				              title: 'Desea agregar el producto?',
				              icon: 'info',
				              showCancelButton: true,
				              cancelButtonText: "Cancelar",
				              confirmButtonColor: '#3085d6',
				              cancelButtonColor: '#d33',
				              confirmButtonText: 'Si, agreagar al carrito!'
				            }).then((result) => {
				              if (result.value) {
				                var ajax = new XMLHttpRequest();
				                ajax.open('POST', 'vistas/modulos/agregar_carrito.php', true);
				                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				                ajax.onreadystatechange = function (){
				                  // Comprobar si se ejecutó correctamente
				                  if (this.readyState == 4 && this.status == 200) {

				                  	if(ajax.responseText == "yaexiste"){

				                  		(async () => {
					                    	var siVibra= "vibrate" in navigator;
											if(siVibra){
												navigator.vibrate(200);
											}
											var notificacion = new Audio("vistas/audio/notificacion_error.mp3");
											notificacion.load();
											notificacion.play();
					                      	const a = await Swal.fire({
						                        icon: "warning",
						                        timer: 4000,
						                        timerProgressBar: true,
						                        title: "Ya lo tienes agregado",
						                        text: "El producto ya ha sido agregado al carrito anteriormente",
						                        footer: "Presione OK para cerrar esta alerta o espere."
					                      	});
					                            
					                    	if(a){
					                        //window.location="index.php?opcion=celulares&pagina=1";
					                        //console.log(ajax.responseText);
					                      	}

					                    })()
				                  	}
				                  	else{
				                  		(async () => {
					                      var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					                      notificacion.play();
					                      const a = await Swal.fire({
					                        icon: "success",
					                        timer: 4000,
					                        timerProgressBar: true,
					                        title: "Producto agregado con éxito",
					                        text: "El producto se agregó al carrito de compras",
					                        footer: "Presione OK para cerrar esta alerta o espere."
					                      });
					                            
					                      if(a){
					                        window.location="index.php?opcion=fundas&pagina=1";
					                        //console.log(ajax.responseText);
					                      }

					                    })()

				                  	}
				                    
				                  }
				                }
				                ajax.send("id_producto="+id_producto+"&ruta_imagen_producto="+ruta_imagen_producto+"&nombre_producto="+nombre_producto+"&almacenamiento="+almacenamiento+"&precio_producto="+precio);
				                
				              }
				            })
				          };
				</script>
				<?php 
			}
		}

		// Método para paginar las fundas
		static public function paginacionFundas(){

			$respuesta = Model::paginacionFundasModelo("producto", 5);
			if($_GET['pagina']>$respuesta['valor_paginas']){
					echo '<script>
					window.location="index.php?opcion=celulares&pagina=1";
					</script>';
			}
			?> 
				<nav aria-label="">
			  	<ul class="pagination justify-content-center">
				    <li class="page-item
				    <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=fundas&pagina='.($_GET['pagina']-1) ?>" tabindex="-1">Anterior</a>
				    </li>

					<?php for($i=0; $i<$respuesta['valor_paginas']; $i++): ?>
				    <li class="page-item
				    <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				    	<a class="page-link" href="<?php echo 'index.php?opcion=fundas&pagina='.($i+1) ?>"><?php echo ($i+1); ?></a>
				    </li>
					<?php endfor ?>

				    <li class="page-item
				    <?php echo $_GET['pagina']>=$respuesta['valor_paginas'] ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=fundas&pagina='.($_GET['pagina']+1) ?>">Siguiente</a>
					</li>
				</ul>
				</nav>
			<?php
				echo '&nbsp;&nbsp;<b>Total de fundas: </b>'.$respuesta['valor_totalArticulosBD'].'<br>';

				if(($_GET['pagina']*$respuesta['valor_articulosXPagina']) < $respuesta['valor_totalArticulosBD']){
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.($_GET['pagina']*$respuesta['valor_articulosXPagina']).'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}
				else{
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.$respuesta['valor_totalArticulosBD'].'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}

		}

		// Método para mostrar las fundas de la BD
		static public function vistaMicas(){

			$respuesta = Model::vistaMicasModelo("producto", 5);
			foreach($respuesta as $renglon => $dato){
				?> 
				<a href="#" style="color: black; text-decoration: none;">
				<div>
			    <img src="<?php echo $dato['ruta_imagen']; ?>" loading="lazy" width="130px" alt="<?php echo $dato['nombre_producto']; ?>">
			    <div id="arti" class="media-body" style="width: 350px;">
			      <h3 class="mt-2"><?php echo $dato['nombre_producto']; ?></h3>
			      <p><?php echo $dato['descripcion_producto']; ?>
			      <h3 style="color: red;">$<?php
			      $precio_f = number_format($dato['max_costo_venta_unitario'], $decimals = 2 , $dec_point = "." , $thousands_sep = "," );
			      $precio = explode(".", $precio_f); 
			      echo $precio[0]; ?><sup><?php echo '.'.$precio[1]; ?>&nbsp;
			      		<div style="color: black; display: inline-flex; font-size: 0.8em;">MXN</div></sup></h3></p>
			    </div>
			  	</div></a>
			  	<?php if($_SESSION['tipo'] == 2){ ?>
				<button type="submit" onclick="agregarCarrito('<?php echo $dato['id_producto']; ?>', '<?php echo $dato['ruta_imagen']; ?>', '<?php echo $dato['nombre_producto']; ?>', '<?php echo $dato['almacenamiento']; ?>', '<?php echo $dato['max_costo_venta_unitario']; ?>');" class="btn btn-outline-primary" style="font-size: 1.2em; border-radius: 17px;">Añadir al carrito</button></p>
				<?php }else{ } ?>
				<div class="card" style="margin-bottom: 10px;"></div>
				<script type="text/javascript">
				  function agregarCarrito(id_producto, ruta_imagen_producto, nombre_producto, almacenamiento, precio){
				            Swal.fire({
				              title: 'Desea agregar el producto?',
				              icon: 'info',
				              showCancelButton: true,
				              cancelButtonText: "Cancelar",
				              confirmButtonColor: '#3085d6',
				              cancelButtonColor: '#d33',
				              confirmButtonText: 'Si, agreagar al carrito!'
				            }).then((result) => {
				              if (result.value) {
				                var ajax = new XMLHttpRequest();
				                ajax.open('POST', 'vistas/modulos/agregar_carrito.php', true);
				                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				                ajax.onreadystatechange = function (){
				                  // Comprobar si se ejecutó correctamente
				                  if (this.readyState == 4 && this.status == 200) {

				                  	if(ajax.responseText == "yaexiste"){

				                  		(async () => {
					                    	var siVibra= "vibrate" in navigator;
											if(siVibra){
												navigator.vibrate(200);
											}
											var notificacion = new Audio("vistas/audio/notificacion_error.mp3");
											notificacion.load();
											notificacion.play();
					                      	const a = await Swal.fire({
						                        icon: "warning",
						                        timer: 4000,
						                        timerProgressBar: true,
						                        title: "Ya lo tienes agregado",
						                        text: "El producto ya ha sido agregado al carrito anteriormente",
						                        footer: "Presione OK para cerrar esta alerta o espere."
					                      	});
					                            
					                    	if(a){
					                        //window.location="index.php?opcion=celulares&pagina=1";
					                        //console.log(ajax.responseText);
					                      	}

					                    })()
				                  	}
				                  	else{
				                  		(async () => {
					                      var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					                      notificacion.play();
					                      const a = await Swal.fire({
					                        icon: "success",
					                        timer: 4000,
					                        timerProgressBar: true,
					                        title: "Producto agregado con éxito",
					                        text: "El producto se agregó al carrito de compras",
					                        footer: "Presione OK para cerrar esta alerta o espere."
					                      });
					                            
					                      if(a){
					                        window.location="index.php?opcion=micas&pagina=1";
					                        //console.log(ajax.responseText);
					                      }

					                    })()

				                  	}
				                    
				                  }
				                }
				                ajax.send("id_producto="+id_producto+"&ruta_imagen_producto="+ruta_imagen_producto+"&nombre_producto="+nombre_producto+"&almacenamiento="+almacenamiento+"&precio_producto="+precio);
				                
				              }
				            })
				          };
				</script>
				<?php 
			}
		}

		// Método que recibe los valores de eliminar_usuario.php
		static public function eliminarProductoController($idProducto){

			if(isset($idProducto)){

				if(!empty($idProducto)){


					$respuesta = Model::eliminarProductoModelo($idProducto, "producto");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El producto fue eliminado con éxito 😄👍",
								html: "El producto fue eliminado",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_productos";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El producto no existe",
								text: "Ingrese un producto existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar el producto con el ID:",
								html: "<b>'.$idProducto.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese la información del productos"
							});
						</script>
						';
					
				}

			}
		}

		// Método para paginar los celulares
		static public function paginacionCelulares(){

			$respuesta = Model::paginacionCelularesModelo("producto", 5);
			if($_GET['pagina']>$respuesta['valor_paginas']){
					echo '<script>
					window.location="index.php?opcion=celulares&pagina=1";
					</script>';
			}
			?> 
				<nav aria-label="">
			  	<ul class="pagination justify-content-center">
				    <li class="page-item
				    <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=celulares&pagina='.($_GET['pagina']-1) ?>" tabindex="-1">Anterior</a>
				    </li>

					<?php for($i=0; $i<$respuesta['valor_paginas']; $i++): ?>
				    <li class="page-item
				    <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				    	<a class="page-link" href="<?php echo 'index.php?opcion=celulares&pagina='.($i+1) ?>"><?php echo ($i+1); ?></a>
				    </li>
					<?php endfor ?>

				    <li class="page-item
				    <?php echo $_GET['pagina']>=$respuesta['valor_paginas'] ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=celulares&pagina='.($_GET['pagina']+1) ?>">Siguiente</a>
					</li>
				</ul>
				</nav>
			<?php
				echo '&nbsp;&nbsp;<b>Total de celulares: </b>'.$respuesta['valor_totalArticulosBD'].'<br>';

				if(($_GET['pagina']*$respuesta['valor_articulosXPagina']) < $respuesta['valor_totalArticulosBD']){
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.($_GET['pagina']*$respuesta['valor_articulosXPagina']).'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}
				else{
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.$respuesta['valor_totalArticulosBD'].'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}

		}

		// Método para paginar las micas
		static public function paginacionMicas(){

			$respuesta = Model::paginacionMicasModelo("producto", 5);
			if($_GET['pagina']>$respuesta['valor_paginas']){
					echo '<script>
					window.location="index.php?opcion=micas&pagina=1";
					</script>';
			}
			?> 
				<nav aria-label="">
			  	<ul class="pagination justify-content-center">
				    <li class="page-item
				    <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=micas&pagina='.($_GET['pagina']-1) ?>" tabindex="-1">Anterior</a>
				    </li>

					<?php for($i=0; $i<$respuesta['valor_paginas']; $i++): ?>
				    <li class="page-item
				    <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				    	<a class="page-link" href="<?php echo 'index.php?opcion=micas&pagina='.($i+1) ?>"><?php echo ($i+1); ?></a>
				    </li>
					<?php endfor ?>

				    <li class="page-item
				    <?php echo $_GET['pagina']>=$respuesta['valor_paginas'] ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?opcion=micas&pagina='.($_GET['pagina']+1) ?>">Siguiente</a>
					</li>
				</ul>
				</nav>
			<?php
				echo '&nbsp;&nbsp;<b>Total de micas: </b>'.$respuesta['valor_totalArticulosBD'].'<br>';

				if(($_GET['pagina']*$respuesta['valor_articulosXPagina']) < $respuesta['valor_totalArticulosBD']){
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.($_GET['pagina']*$respuesta['valor_articulosXPagina']).'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}
				else{
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.$respuesta['valor_totalArticulosBD'].'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}

		}

	}
?>