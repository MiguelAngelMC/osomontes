<?php

	session_start();

	if(!empty($_SESSION['usuario'])){

		session_unset();

		session_destroy();

	}
	else{

		echo '<script>
			  	window.location="index.php?opcion=login";
			  </script>';

	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>