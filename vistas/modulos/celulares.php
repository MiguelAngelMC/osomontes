<?php
	if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
		<div class="alert alert-primary" role="alert">
		    Celulares
		</div>
		<center>
		  <?php

		    $resultado = new Controller();
		    $resultado -> vistaCelulares();

		    $paginacion = new Controller();
		    $paginacion -> paginacionCelulares();

		  ?>
		</center>
<?php
	}else{

		echo '<script>
			  	window.location="index.php?opcion=celulares&pagina=1";
			  </script>';
		echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

	}
?>