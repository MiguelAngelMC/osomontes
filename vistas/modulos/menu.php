<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(0, 0, 0, 1);">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand mx-auto" href="index.php" title="Oso Montes"><img src="vistas/img/logocelosomontes2.png" alt="Logo Oso Montes" width="75vw" loading="lazy"></a>

    <a href="index.php?opcion=login" title="Acceder">
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <img src="vistas/img/menu/user.png" alt="Logo Usuario" width="40px" style="color: white;" loading="lazy">
    </button>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Servicios">
            <img src="vistas/img/menu/herramientas.png" alt="Logo Herramientas" width="32px"><b> Servicios</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?opcion=recargas" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Recargas</a>
            <a class="dropdown-item" href="index.php?opcion=liberaciones" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Liberaciones</a>
            <a class="dropdown-item" href="index.php?opcion=estatus_servicio" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Estatus de liberación/reparación</a>
          </div>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Productos" style="margin-right: 48vw;"><img src="vistas/img/menu/productos.png" alt="Logo Productos" width="32px" loading="lazy"><b> Productos</b></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="index.php?opcion=celulares&pagina=1" title="Celulares"><img src="vistas/img/menu/celular.png" alt="Logo Celulares" width="32px" loading="lazy"> Celulares</a>
            <a class="dropdown-item" href="index.php?opcion=fundas&pagina=1" title="Fundas"><img src="vistas/img/menu/funda.png" alt="Logo Fundas" width="32px" loading="lazy"> Fundas</a>
            <a class="dropdown-item" href="index.php?opcion=micas&pagina=1" title="Micas"><img src="vistas/img/menu/mica.png" alt="Logo Micas" width="32px" loading="lazy"> Micas</a>
            <a class="dropdown-item" href="index.php?opcion=audifonos&pagina=1" title="Audífonos"><img src="vistas/img/menu/audifonos.png" alt="Logo Audífonos" width="32px" loading="lazy"> Audífonos</a>
            <a class="dropdown-item" href="index.php?opcion=cargadores&pagina=1" title="Cargadores"><img src="vistas/img/menu/cargador.png" alt="Logo Cargadores" width="32px" loading="lazy"> Cargadores</a><br>
            <a class="dropdown-item" href="index.php?opcion=todo&pagina=1" title="Todo"><img src="vistas/img/menu/todo.png" alt="Logo Todo" width="32px" loading="lazy"> Todo</a>
          </div>
        </li>
        
        <ul class="navbar-nav inline">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cuenta"><img src="vistas/img/menu/cuenta.png" alt="Logo Cuenta" width="32px" loading="lazy"><b> Cuenta</b></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?opcion=login" title="Iniciar sesión"><img src="vistas/img/menu/user.png" alt="Logo Usuario" width="32px" style="color: white;" loading="lazy"> Iniciar sesión</a>
            <a class="dropdown-item" href="index.php?opcion=registro" title="Registrarse"><img src="vistas/img/menu/register.png" alt="Logo Registrarse" width="32px" loading="lazy"> Registrarse</a>
          </div>
        </li>
        </ul>

        </ul>
    </div>
  </div>
</nav>
<center style="background-color: rgba(0, 0, 0, 1);">

  
      <div class="offset-1 form-inline">
        <input id="barra" type="search" placeholder="Buscar" aria-label="Search" style="border-radius: 17px;">&nbsp;
        <button class="btn btn-primary" style="margin-bottom: 10px; border-radius: 17px;" onclick="window.location.href='index.php?opcion=buscar&s='+document.getElementById('barra').value+'&pagina=1';" id="boton">
          <span class="icon-search" title="Buscar"></span>
        </button>
      </div>
   
  
 </center>
 <script type="text/javascript">
   // Get the input field
  var input = document.getElementById("barra");

  // Execute a function when the user releases a key on the keyboard
  input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("boton").click();
  }
}); 
 </script>