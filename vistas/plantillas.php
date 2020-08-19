<?php
  ini_set('session.gc_maxlifetime', 3600);
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Empresa de telefonía celular, accesorios y servicios originaria de Santiago Ixcuintla, Nayarit, México. Realiza compras online seguras y paga con tu tarjeta de crédito/débito o tu cuenta de PayPal">
	<title>Oso Montes</title>
	<link rel="shortcut icon" type="image/x-icon" href="vistas/img/logocelosomontes2.png">
	<link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.css">
	<script type="text/javascript" src="vistas/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="vistas/js/bootstrap.js"></script>
	<link rel="stylesheet" href="vistas/fonts/style.css">
	<link rel="stylesheet" type="text/css" href="vistas/css/main.css">
  <script src="vistas/js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="vistas/css/sweetalert2.min.css">

  <!-- Datatables -->
  <script type="text/javascript" src="Plug-ins/datatables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Plug-ins/datatables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="Plug-ins/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" src="Plug-ins/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/buttons.flash.min.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/jszip.min.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/pdfmake.min.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/vfs_fonts.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/buttons.html5.min.js"></script>
  <script type="text/javascript" src="Plug-ins/datatables/buttons.print.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Plug-ins/datatables/buttons.dataTables.min.css">
  <script type="text/javascript" src="Plug-ins/datatables/"></script>

</head>
<body>
	<div>
		<?php
    
      $tepi = new Controller();
      $tepi -> verificarExistenciaPerfilController();
      
      if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 2){
        //echo $_SESSION['usuario']."<br>";
        //echo $_SESSION['tipo'];
        include("modulos/menu_usuario.php");
      }
      else if(!empty($_SESSION['usuario']) && $_SESSION['tipo'] == 1){
        //echo $_SESSION['usuario']."<br>";
        //echo $_SESSION['tipo'];
        include("modulos/menu_admin.php");
      }
      else{
        include("modulos/menu.php");
      }
		?>
	</div>
	<div>
		<!-- este es el DIV dinámico -->
		<?php
			$des = new Controller();
			$des -> enlacesPaginaController();
		?>
	</div>
	<div style="background-color: black;">
    
		<!------------------------------ aqui va el footer ---------------------------------->
	<center>
	<img src="vistas/img/logocelosomontes2.png" loading="lazy" alt="Logo Oso Montes" width="100vw" style="margin-top: 25px;"><br>
	</center>
    <hr class="my-4">

    <!-- Button trigger modal -->
    <center>
    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Ubicación y contacto</button>
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal1">Métodos de pago</button>
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">Acerca de</button></center>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubicación y contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 20px;">
        <p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.266900531912!2d-105.20969398555108!3d21.808616266074456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8420af4d7c9332d1%3A0x7855d65d14ec7475!2sIgnacio%20Zaragoza%2048%2C%20Centro%2C%2063300%20Santiago%20Ixcuintla%2C%20Nay.!5e0!3m2!1ses!2smx!4v1585957342766!5m2!1ses!2smx" frameborder="0" style="border:0;" width="100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br>
        <p><div style="vertical-align: middle; display: inline-flex;"><span class="icon-location" style="font-size: 30px;"></span> 20 de Noviembre #7 entre Rayon y Bravo, colonia Centro 
        SANTIAGO IXCUINTLA, NAYARIT 63300</div></p>
        <a id="whats" style="text-decoration: none;" href="https://wa.me/523231009892?text=Hola,%20necesito%20de%20los%20servicios%20de%20tu%20página%20web." target="_blank" title="Iniciar chat"><p><div style="vertical-align: middle; display: inline-flex;"><span class="icon-whatsapp" style="font-size: 30px;"></span>&nbsp;323 100 9892</div></a></p>
        <a id="face" href="https://www.facebook.com/pages/Celulares-Oso-Montes/293767271095673" target="_blank" style="text-decoration: none;" title="Abrir página en facebook"><p><div style="vertical-align: middle; display: inline-flex;"><span class="icon-facebook2" style="font-size: 30px;"></span>&nbsp;OsoMontes</div></a></p>
        <a id="correo" style="text-decoration: none;" title="Escríbenos un correo"><p><div style="vertical-align: middle; display: inline-flex;"><span class="icon-mail" style="font-size: 30px;"></span><img src="vistas/img/correo.png" alt="Correo Oso Montes" height="21px" style="margin-top: 5px;"></div></a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" title="Cerrar">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Métodos de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color: black;">
		
		<h5><b>PayPal</b> <img src="vistas/img/tarjetas/paypal.png" alt="PayPal Logo" width="15%"></h5>
        Puedes pagar con tu cuenta de PayPal.<br><br>

        <h5><b>Crédito</b> <img src="vistas/img/tarjetas/tarjeta-mastercard.png" alt="Mastercard Logo" width="13%"> <img src="vistas/img/tarjetas/visa.png" alt="Visa Logo" width="13%"></h5>
        Puedes pagar con tu tarjeta Visa y Mastercard.
        <br><br>

        <h5><b>Débito</b> <img src="vistas/img/tarjetas/tarjeta-mastercard.png" alt="Mastercard Logo" width="13%"> <img src="vistas/img/tarjetas/visa.png" alt="Visa Logo" width="13%"></h5>
        Puedes pagar con tu tarjeta Visa y Mastercard.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" title="Cerrar">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Acerca de nosotros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
        <img src="vistas/img/logocelosomontes2.png" alt="Logo Oso Montes" width="100vw" style="margin-top: 10px;"><br><br>
        </center>
        <p style="justify-content: left;">Celulares Oso Montes es una tienda de telefonía celular y accesorios la cual ofrece diferentes tipos de celulares, micas, fundas, audifonos, cargadores, así mismo también ofrece servicios como lo son las recargas y liberaciones.<br>
          Celulares Oso Montes puede entregar a calquier parte de Nayarit sus articulos por medio de paqueteria, siendo este un servicio confiable y seguro para la entrega de los articulos, lo cual garantiza la seguridad de sus productos para que el artículo no llegue dañado y así puedan disfrutar de un buen servicio.<br>
           Esta tienda es una de las más reconocidas y buscadas por las personas de todo el municipio de Santiago.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" title="Cerrar">Cerrar</button>
      </div>
    </div>
  	</div>
	</div><br>
	<center>
	<div style="color: white;">
	© Celulares Oso Montes - Todos los derechos reservados
	</div><br></center>
</body>
</html>