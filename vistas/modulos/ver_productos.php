<div class="alert alert-primary">
	Productos existentes
</div>
<div style="margin-left: 3%; margin-right: 3%; box-shadow: 0px 0px 5px 1px black; border-radius: 10px; border: none;">
	<div class="table-responsive" style="padding: 1%;">
		<button class="btn btn-primary" id="btn-agregar" title="Agregar producto" onclick="window.location='index.php?opcion=registrar_producto'" style="margin-bottom: 10px;">Agregar producto</button><br>
		<table id="tablaProducto" class="table table-hover table-sm display" style="white-space: nowrap; width: 100%;">
			<thead>
				<tr>
					<th>#ID</th>
					<th>CATEGORÍA</th>
					<th>IMEI</th>
					<th>MARCA</th>
					<th>#ID PROVEEDOR</th>
					<th>IMÁGEN</th>
					<th>NOMBRE</th>
					<th>ALMACENAMIENTO</th>
					<th>DESCRIPCIÓN</th>
					<th>COSTO DE COMPRA</th>
					<th>COSTO DE VENTA</th>
					<th>FECHA CREACIÓN</th>
					<th>ÚLTIMA MODIFICACIÓN</th>
					<th>STATUS</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$resultado = new Controller();
					$resultado -> vistaProductos();
				?>
			</tbody>
		</table>
	</div>
</div><br>
<center>
	<img src="vistas/img/deslizar.png" width="40px">
</center><br>
<script type="text/javascript">
					function confirmar3(id_producto, nombre_producto, almacenamiento_producto, imagen_producto){
						Swal.fire({
						  title: 'Estás seguro?',
						  html: '<img src='+imagen_producto+' width="150px;"><br><b>#ID: </b>'+id_producto+"<br><b>Nombre: </b>"+nombre_producto+"<br><b>Almacenamiento: </b>"+almacenamiento_producto+'<br>',
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: "Cancelar",
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Si, eliminar!'
						}).then((result) => {
						  if (result.value) {
						  	var ajax = new XMLHttpRequest();
						  	ajax.open('GET', 'index.php?opcion=eliminar_producto&id='+id_producto, true);
						  	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						  	ajax.onreadystatechange = function (){
						  		console.log(ajax.responseText);
						  		// Comprobar si se ejecutó correctamente
							  	if (this.readyState == 4 && this.status == 200) {
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
	  							}
						  	}
						  	ajax.send();
						  	
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
    	$('#tablaProducto').DataTable({

    		dom: 'Bfrtilp',
        	buttons:[
        	{
				extend:    'copyHtml5',
				text:      'Copiar',
				titleAttr: 'Copiar',
				title: "Productos Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
                }
			},
			{
				extend:    'csvHtml5',
				text:      'CSV',
				titleAttr: 'Exportar en CSV',
				filename: "Productos existentes ("+fecha+")",
				charset: "utf-8",
				bom: "true",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
                }
			},
			{
				extend:    'excelHtml5',
				text:      '<span class="icon-file-excel" style="font-size: 1.7em; color: green;">',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success',
				filename: "Productos existentes ("+fecha+")", 
				sheetName: "Productos ("+fecha+")", 
				title: "Productos Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
                }
			},
			{
				extend:    'pdfHtml5',
				orientation: 'landscape',
				pageSize : 'LEGAL',
				text:      '<span class="icon-file-pdf" style="font-size: 1.7em; color: red;">',
				titleAttr: 'Exportar a PDF',
				filename: "Productos existentes ("+fecha+")",
				title: "Productos Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
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
				filename: "Productos existentes ("+fecha+")",
				title: "Productos Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
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