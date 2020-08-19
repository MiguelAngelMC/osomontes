<?php
	if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
		<div class="alert alert-primary" role="alert">
		    Fundas
		</div>
		<center>
		  <?php

		    $resultado = new Controller();
		    $resultado -> vistaFundas();

		    $paginacion = new Controller();
		    $paginacion -> paginacionFundas();

		  ?>
		</center>
<?php
	}else{

		echo '<script>
			  	window.location="index.php?opcion=fundas&pagina=1";
			  </script>';
		echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

	}
?>