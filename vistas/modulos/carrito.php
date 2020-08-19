<center><br>
	<h3>Carrito de compras <span class="icon-cart" style="font-size: 30px;"></span></h3>
<?php if(!empty($_SESSION['carrito'])){ ?>
	<table class="table table-responsive table-bordered" style="margin-top: 15px; white-space: nowrap;">
		<thead>
			<tr>
				<th width="10%" class="text-center">#ID</th>
				<th width="20%" class="text-center">PRODUCTO</th>
				<th width="10%">PRECIO</th>
				<th width="5%" class="text-center"></th>
			</tr>
		</thead>
		<tbody>
		<?php $total=0; ?>
		<?php foreach($_SESSION['carrito'] as $indice => $dato) { ?>
		<tr>
			<td class="text-center"><?php echo $dato['id_producto']; ?></td>
			<td><img src="<?php echo $dato['ruta_imagen_producto']; ?>" width="125px"> <?php echo $dato['nombre_producto']." ".$dato['almacenamiento']; ?></td>
			<td class="text-center"><?php echo "$".number_format($dato['precio'], 2); ?></td>
			<td><button class="btn btn-danger" style="border-radius: 17px;" onclick="eliminarArticulo()">Eliminar</button></td>
		</tr>
		<?php $total = ($total+floatval($dato['precio']));?>
		<?php } ?>
		<tr>
			<td colspan="2" align="right"><h3>Total:</h3></td>
			<td align="right"><h3><?php echo "$".number_format($total, 2); ?></h3></td>
		</tr>
		</tbody>
	</table>
<?php }else{ ?>
		<div class="alert alert-warning" role="alert">Tu carrito de compras está vacío :(</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php } ?>
</center>
<script type="text/javascript">
	function eliminarArticulo(id_producto, ruta_imagen_producto, nombre_producto, almacenamiento, precio){
				            Swal.fire({
				              title: 'Desea eliminar el artículo?',
				              icon: 'info',
				              showCancelButton: true,
				              cancelButtonText: "Cancelar",
				              confirmButtonColor: '#3085d6',
				              cancelButtonColor: '#d33',
				              confirmButtonText: 'Si, eliminar del carrito!'
				            }).then((result) => {
				              if (result.value) {
				                var ajax = new XMLHttpRequest();
				                ajax.open('POST', 'vistas/modulos/eliminar_del_carrito.php', true);
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