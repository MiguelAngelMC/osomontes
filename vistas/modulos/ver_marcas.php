<div class="alert alert-primary">
	Marcas existentes
</div>
<div style="margin-left: 3%; margin-right: 3%; box-shadow: 0px 0px 30px 1px black; border-radius: 10px; border: none;">
		<div class="table-responsive" style="padding: 1%;">
			<button class="btn btn-primary" id="btn-agregar" onclick="window.location='index.php?opcion=registrar_marca'" style="margin-bottom: 10px;" title="Agregar marca">Agregar marca</button><br>
			<table id="tablaMarca" class="table table-hover table-sm display" style="white-space: nowrap; width: 100%;">
				<thead>
					<tr>
						<th>MARCA</th>
						<th>FECHA DE CREACIÓN</th>
						<th>ÚLTIMA MODIFICACIÓN</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$resultado = new Controller();
						$resultado -> vistaMarcas();
					 ?>
				</tbody>
			</table>
		</div>
	</div><br>
	<center>
		<img src="vistas/img/deslizar.png" width="40px">
	</center><br>
	<script type="text/javascript">
					function confirmar(marca){
						Swal.fire({
						  title: 'Estás seguro?',
						  html: "Se eliminará la marca: <b>"+marca+"</b>",
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: "Cancelar",
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Si, eliminar!'
						}).then((result) => {
						  if (result.value) {
						    window.location="index.php?opcion=eliminar_marca&marca="+marca;
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
    	$('#tablaMarca').DataTable({

    		dom: 'Bfrtilp',
        	buttons:[
        	{
				extend:    'copyHtml5',
				text:      'Copiar',
				titleAttr: 'Copiar',
				title: "Marcas Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
			},
			{
				extend:    'csvHtml5',
				text:      'CSV',
				titleAttr: 'Exportar en CSV',
				filename: "Marcas existentes ("+fecha+")",
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
				filename: "Marcas existentes ("+fecha+")", 
				sheetName: "Marcas ("+fecha+")", 
				title: "Marcas Existentes ("+fecha+")",
				exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
			},
			{
				extend:    'pdfHtml5',
				text:      '<span class="icon-file-pdf" style="font-size: 1.7em; color: red;">',
				titleAttr: 'Exportar a PDF',
				filename: "Marcas existentes ("+fecha+")",
				title: "Marcas Existentes ("+fecha+")",
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
				filename: "Marcas existentes ("+fecha+")",
				title: "Marcas Existentes ("+fecha+")",
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