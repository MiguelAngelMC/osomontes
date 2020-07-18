<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(0, 0, 0, 1);">
  <a class="navbar-brand" href="index.php" title="Oso Montes"><img src="vistas/img/logocelosomontes2.png" width="73vw"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Servicios">
          <img src="vistas/img/menu/herramientas.png" width="32px"><b> Servicios</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Recargas</a>
          <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Activar chips</a><br>
          <a class="dropdown-item" href="index.php?opcion=desicion2" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Liberaciones</a>
          <a class="dropdown-item" href="index.php?opcion=desicion2" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Cuenta de Google</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Productos" style="margin-right: 25vw;"><img src="vistas/img/menu/productos.png" width="32px"><b> Productos</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=celulares" title="Celulares"><img src="vistas/img/menu/celular.png" width="32px"> Celulares</a>
          <a class="dropdown-item" href="index.php?opcion=fundas" title="Fundas"><img src="vistas/img/menu/funda.png" width="32px"> Fundas</a>
          <a class="dropdown-item" href="index.php?opcion=micas" title="Micas"><img src="vistas/img/menu/mica.png" width="32px"> Micas</a>
          <a class="dropdown-item" href="index.php?opcion=audifonos" title="Audífonos"><img src="vistas/img/menu/audifonos.png" width="32px"> Audífonos</a>
          <a class="dropdown-item" href="index.php?opcion=cargadores" title="Cargadores"><img src="vistas/img/menu/cargador.png" width="32px"> Cargadores</a><br>
          <a class="dropdown-item" href="index.php?opcion=todo" title="Todo"><img src="vistas/img/menu/todo.png" width="32px"> Todo</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Carrito" ><img src="vistas/img/menu/carrito.png" width="32px"><b> Carrito</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="" title=""></a>
          <center>
          <button type="submit" class="btn btn-success" style="width: 100%; border-radius: 0;">Comprar</button>
          <a href="#">Vaciar carrito</a>
          </center>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cuenta" ><img src="vistas/img/menu/cuenta.png" width="32px"><b> <?php echo $_SESSION['usuario'];?></b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_perfil" title="Perfil"><img src="vistas/img/menu/user.png" width="32px"> <?php echo $_SESSION['usuario'];?></a>
          <a class="dropdown-item" href="index.php?opcion=cerrar_sesion" title="Cerrar sesión"><img src="vistas/img/menu/register.png" width="32px" style="transform: rotate(200grad);"> Cerrar sesión</a>
        </div>
      </li>

      </ul>
</div>
</nav>
 <center>
 <form style="background-color: rgba(0, 0, 0, 1);">

  
      <div class="offset-1 form-inline">
        <input id="barra" src="vistas/img/buscar.png" type="search" placeholder="Buscar" aria-label="Search">
      &nbsp;
      <button class="btn btn-primary" style="margin-bottom: 10px;" type="submit">
        <span class="icon-search" title="Buscar"></span>
      </button></div>
   
 
  </form>
 </center>