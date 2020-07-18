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

				if(!empty($_POST['nombre']) && !empty($_POST['ape']) && !empty($_POST['sexo']) && !empty($_POST['fecha_nac']) && !empty($_POST['tel']) && !empty($_POST['locali']) && !empty($_POST['estado']) && !empty($_POST['domic']) && !empty($_POST['corre']) && !empty($_POST['contra'])){

					$datos = array('valor_nombre'=>$_POST['nombre'], 'valor_apellidos'=>$_POST['ape'], 'valor_sexo'=>$_POST['sexo'], 'valor_fecha_nacimiento'=>$_POST['fecha_nac'], 'valor_telefono'=>$_POST['tel'], 'valor_localidad'=>$_POST['locali'], 'valor_estado'=>$_POST['estado'], 'valor_domicilio'=>$_POST['domic'], 'valor_correo'=>$_POST['corre'], 'valor_contra'=>$_POST['contra']);

					$respuesta = Model::registroModelo($datos, "usuario");
					
					if($respuesta == "ok"){
						echo '<script>
						(async () => {
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
						(async () => {
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

		// Método que recibe los valores de verificar_contra.php
		static public function verificarContraController(){

			if(!empty($_SESSION['id_usuario']) && !empty($_POST['contra'])){

				$datos = array('valor_id'=>$_SESSION['id_usuario'], 'valor_contra'=>$_POST['contra']);

				$respuesta = Model::verificarContraModelo($datos, "usuario");
				
				if($respuesta == "ok"){
					echo '<script>
						(async () => {
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

		// Método para mostrar el perfil con el ID del usuario
		static public function verPerfilController(){

			if(!empty($_SESSION['id_usuario'])){

				$respuesta = Model::vistaPerfilModelo($_SESSION['id_usuario'], "usuario");
				
				if(!empty($respuesta)){
					foreach($respuesta as $renglon => $dato){
						?>
						<table>
							<tr>

								<td>
									<label for="nombre"><b>Nombre:</b></label>
							        <div name="nombre">
							        	<?php echo $dato['nombre']; ?>
							        </div>
							    </td>
							    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							    <td>
							        <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_nombre';">Editar</button>
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
						        	<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?opcion=cambiar_apellidos';">Editar</button>
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
						    		<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?opcion=verificar_contra';">Editar</button>
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
		static public function RegistrarProductoController(){

			if(!empty($_POST['corre'])){

				$respuesta = Model::RegistrarProductoModelo($_POST['corre'], "usuario");
				
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

		// Método que recibe los valores de registrar_categoria
		static public function registrarCategoriaController(){

			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre'])){

					$respuesta = Model::registrarCategoriaModelo($_POST['nombre'], "categoria");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
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
								<td><?php echo $dato['fecha']." &nbsp;&nbsp;&nbsp;".$dato['hora']; ?></td>
								<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
									echo 'Sin modificaciones';
								}else{
										echo $dato['fecha_modificacion']." &nbsp;&nbsp;&nbsp;".$dato['hora_modificacion'];
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
				<option value="<?php echo $dato['nombre_categoria']; ?>"><?php echo $dato['nombre_categoria']; ?></option>
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
					<td><?php echo $dato['fecha']." &nbsp;&nbsp;&nbsp;".$dato['hora']; ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." &nbsp;&nbsp;&nbsp;".$dato['hora_modificacion'];
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
				<option value="<?php echo $dato['nombre_marca']; ?>"><?php echo $dato['nombre_marca']; ?></option>
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
					<td><?php echo $dato['fecha_registro']." &nbsp;&nbsp;&nbsp;".$dato['hora_registro']; ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." &nbsp;&nbsp;&nbsp;".$dato['hora_modificacion'];
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
				<option value="<?php echo $dato['id_proveedor']; ?>"><?php echo $dato['nombre_proveedor'].' '.$dato['apellidos_proveedor']; ?></option>
				<?php 
			}
		}

		// Método que recibe los valores del formulario de registro
		static public function registroManualController(){
			if(isset($_POST['nombre'])){

				if(!empty($_POST['nombre']) && !empty($_POST['ape']) && !empty($_POST['sexo']) && !empty($_POST['fecha_nac']) && !empty($_POST['tel']) && !empty($_POST['locali']) && !empty($_POST['estado']) && !empty($_POST['domic']) && !empty($_POST['corre']) && !empty($_POST['contra']) && !empty($_POST['rol'])){

					$datos = array('valor_nombre'=>$_POST['nombre'], 'valor_apellidos'=>$_POST['ape'], 'valor_sexo'=>$_POST['sexo'], 'valor_fecha_nacimiento'=>$_POST['fecha_nac'], 'valor_telefono'=>$_POST['tel'], 'valor_localidad'=>$_POST['locali'], 'valor_estado'=>$_POST['estado'], 'valor_domicilio'=>$_POST['domic'], 'valor_correo'=>$_POST['corre'], 'valor_contra'=>$_POST['contra'], 'valor_rol'=>$_POST['rol']);

					$respuesta = Model::registroManualModelo($datos, "usuario");
					
					if($respuesta == "ok"){
						echo '<script>
						(async () => {
							const a = await Swal.fire({
								icon: "success",
								timer: 5000,
								timerProgressBar: true,
								title: "Usuario registrado con éxito",
								text: "Se le envió un correo de aviso al usuario",
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
					<td><?php echo $dato['correo']; ?></td>
					<td><?php echo $dato['contra']; ?></td>
					<td><?php echo $dato['status']; ?></td>
					<td><?php echo $dato['num_rol']; ?></td>
					<td><?php echo $dato['fecha']." &nbsp;&nbsp;&nbsp;".$dato['hora']; ?></td>
					<td><?php echo $dato['fecha_confirmacion']." &nbsp;&nbsp;&nbsp;".$dato['hora_confirmacion']; ?></td>
					<td><?php if(($dato['fecha_ultima_sesion'] == NULL) && ($dato['hora_ultima_sesion'] == NULL)){
						echo 'Nunca ha iniciado sesión';
					}else{
						echo $dato['fecha_ultima_sesion']." &nbsp;&nbsp;&nbsp;".$dato['hora_ultima_sesion'];
					} ?></td>
					<td><?php if(($dato['fecha_modificacion'] == NULL) && ($dato['hora_modificacion'] == NULL)){
						echo 'Sin modificaciones';
					}else{
						echo $dato['fecha_modificacion']." &nbsp;&nbsp;&nbsp;".$dato['hora_modificacion'];
					} ?></td>
					<td><button class="btn btn-warning" onclick="window.location='index.php?opcion=editar_usuario&nombre=<?php echo $dato['nombre'].'&apellidos='.$dato['apellidos'].'&sexo='.$dato['sexo'].'&fecha_nac='.$dato['fecha_nac'].'&celular='.$dato['celular'].'&localidad='.$dato['localidad'].'&estado='.$dato['estado'].'&domicilio='.$dato['domicilio'].'&id_usuario='.$dato['id_user'].'&correo='.$dato['correo'].'&contra='.$dato['contra'].'&status='.$dato['status'].'&num_rol='.$dato['num_rol'].'&fecha='.$dato['fecha'].'&hora='.$dato['hora']; ?>'">Editar</button> <button class="btn btn-danger" onclick="confirmar2('<?php echo $dato['id_user']; ?>', '<?php echo $dato['nombre']; ?>', '<?php echo $dato['apellidos']; ?>', '<?php echo $dato['correo']; ?>')">🗑️</button></td>
				</tr>
				<?php 
			}
		}

		// Método que recibe los valores de editar_usuario.php
		static public function editarUsuarioController(){

			if(isset($_POST['nvoNombre'])){

				if(!empty($_POST['nvoNombre'])){

					$datos = array('valor_categoria'=>$categoria, 'valor_nvoNombre'=>$_POST['nvoNombre']);

					$respuesta = Model::editarUsuarioModelo($datos, "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
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

		// Método que recibe los valores de eliminar_usuario.php
		static public function eliminarUsuarioController($idUsuario, $nombreUsuario, $apellidosUsuario, $correoUsuario){

			if(isset($idUsuario) && isset($nombreUsuario)){

				if(!empty($idUsuario) && !empty($nombreUsuario)){

					$datos = array('valor_idUsuario'=>$idUsuario, 'valor_nombreUsuario'=>$nombreUsuario);

					$respuesta = Model::eliminarUsuarioModelo($datos, "usuario");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							const a = await Swal.fire({
								icon: "success",
								title: "El usuario fue eliminado con éxito 😄👍",
								html: "El usuario: <b>'.$nombreUsuario.' '.$apellidosUsuario.'</b><br>Correo: <b>'.$correoUsuario.'</b>, fue eliminado",
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
								title: "El usuario: '.$nombreUsuario.' '.$apellidosUsuario.'<br>Correo: '.$correoUsuario.' no existe",
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
								title: "Ups!😢<br> Ocurrió un error al modificar al usuario:",
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
								title: "Porfavor ingrese una categoria"
							});
						</script>
						';
					
				}

			}
		}

	}
?>