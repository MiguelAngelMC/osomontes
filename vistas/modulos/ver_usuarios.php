<div class="alert alert-primary">
	Usuarios existentes
</div>
<div style="margin-left: 3%; margin-right: 3%; box-shadow: 0px 0px 5px 1px black; border-radius: 10px; border: none;">
	<div class="table-responsive" style="padding: 1%;">
		<button class="btn btn-primary" id="btn-agregar" title="Agregar usuario" onclick="window.location='index.php?opcion=registro_manual'" style="margin-bottom: 10px;">Agregar usuario</button><br>
		<table id="tablaUsuario" class="table table-hover table-sm display" style="white-space: nowrap; width: 100%;">
			<thead>
				<tr>
					<th>#ID</th>
					<th>NOMBRE</th>
					<th>APELLIDOS</th>
					<th>SEXO</th>
					<th>FECHA DE NACIMIENTO</th>
					<th>CELULAR</th>
					<th>LOCALIDAD</th>
					<th>ESTADO</th>
					<th>DOMICILIO</th>
					<th>CÓDIGO POSTAL</th>
					<th>CORREO</th>
					<th>CONTRASEÑA</th>
					<th>ESTATUS</th>
					<th>ROL</th>
					<th>FECHA CREACIÓN</th>
					<th>FECHA CONFIRMACIÓN</th>
					<th>ÚLTIMA SESIÓN</th>
					<th>ÚLTIMA MODIFICACIÓN</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$resultado = new Controller();
					$resultado -> vistaUsuarios();
				 ?>
			</tbody>
		</table>
	</div>
</div><br>
<center>
	<img src="vistas/img/deslizar.png" width="40px">
</center><br>
<script type="text/javascript">
					function confirmar2(id_usuario, nombre_usuario, apellidos_usuario, correo_usuario){
						Swal.fire({
						  title: 'Estás seguro?',
						  html: "Se eliminará <br>Usuario: <b>"+nombre_usuario+" "+apellidos_usuario+"</b><br> Correo: <b>"+correo_usuario+"</b>",
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: "Cancelar",
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Si, eliminar!'
						}).then((result) => {
						  if (result.value) {
						    window.location="index.php?opcion=eliminar_usuario&id_usuario="+id_usuario+"&nombre_usuario="+nombre_usuario+"&apellidos_usuario="+apellidos_usuario+"&correo_usuario="+correo_usuario;
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
    	$('#tablaUsuario').DataTable({

    		dom: 'Bfrtilp',
        	buttons:[
        	{
				extend:    'copyHtml5',
				text:      'Copiar',
				titleAttr: 'Copiar',
				title: "Usuarios Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
                }
			},
			{
				extend:    'csvHtml5',
				text:      'CSV',
				titleAttr: 'Exportar en CSV',
				filename: "Usuarios existentes ("+fecha+")",
				charset: "utf-8",
				bom: "true",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
                }
			},
			{
				extend:    'excelHtml5',
				text:      '<span class="icon-file-excel" style="font-size: 1.7em; color: green;">',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success',
				filename: "Usuarios existentes ("+fecha+")", 
				sheetName: "Usuarios ("+fecha+")", 
				title: "Usuarios Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
                }
			},
			{
				extend:    'pdfHtml5',
				orientation: 'landscape',
				pageSize : 'LEGAL',
				text:      '<span class="icon-file-pdf" style="font-size: 1.7em; color: red;">',
				titleAttr: 'Exportar a PDF',
				filename: "Usuarios existentes ("+fecha+")",
				title: "Usuarios Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
                },
                customize: function(doc) {
						        	//pageMargins [left, top, right, bottom] 
						        	doc.pageMargins = [ 1, 20, 1, 20 ];
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
				filename: "Usuarios existentes ("+fecha+")",
				title: "Usuarios Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
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