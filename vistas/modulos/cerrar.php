<?php

	if(!empty($_SESSION['usuario'])){

		session_destroy();

	}
	else{

		echo '<script>
			  	window.location="index.php?opcion=login";
			  </script>';

	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>