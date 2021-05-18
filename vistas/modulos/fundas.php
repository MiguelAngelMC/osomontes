<?php
	if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
	  		<div class="container" style="display: inline-flex;">
	    		<li class="breadcrumb-item">
	    			<a href="index.php">
	    				<span class="icon-home3"></span> Inicio
	    			</a>
	    		</li>
	    		<li class="breadcrumb-item active" aria-current="page">
	    			<span class="icon-mobile"></span> Fundas
	    		</li>
			</div>
		</ol>
	</nav>
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