<?php

	if(!empty($_SESSION['usuario'])){

		session_destroy();
		echo '<script>
				(async () => {
					var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
					notificacion.play();
					const a = await Swal.fire({
						icon: "success",
						timer: 4000,
						timerProgressBar: true,
						title: "Ha cerrado sesión con éxito",
						text: "Esperamos que vuelva pronto 👋",
						footer: "Presione OK para cerrar esta alerta o espere."
					});
								
					if(a){
						window.location="index.php?opcion=login";
					}

				})()
							
			</script>';

	}
	else{

		echo '<script>
			  	window.location="index.php?opcion=login";
			  </script>';

	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>