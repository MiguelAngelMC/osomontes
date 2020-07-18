<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(0, 0, 0, 1);">
  <a class="navbar-brand" href="index.php" title="Oso Montes"><img src="vistas/img/logocelosomontes2.png" width="73vw">&nbsp;&nbsp;Panel Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Servicios"><img src="vistas/img/menu/herramientas.png" width="32px"><b> Registros</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Recargas</a>
          <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Activar chips</a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="index.php?opcion=registrar_producto" title="Liberaciones"><img src="vistas/img/menu/regarti.png" width="32px"> Registrar producto</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_categoria" title="Liberaciones"><img src="vistas/img/menu/add_categoria.png" width="32px"> Registrar categoría</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_marca" title="Liberaciones"><img src="vistas/img/menu/addmarca.png" width="32px"> Registrar marca</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_proveedor" title="Liberaciones"><img src="vistas/img/menu/add_proveedor.png" width="32px"> Registrar proveedor</a>
          <a class="dropdown-item" href="index.php?opcion=registro_manual" title="Liberaciones"><img src="vistas/img/menu/add_user.png" width="32px"> Registrar usuario</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Ver tablas"><img src="vistas/img/menu/tablas.png" width="32px"><b> Ver tablas</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_productos" title="Producto"><img src="vistas/img/menu/productos.png" width="32px"> Producto</a>
          <a class="dropdown-item" href="index.php?opcion=ver_categorias" title="Categoría"><img src="vistas/img/menu/categoria.png" width="32px"> Categoría</a>
          <a class="dropdown-item" href="index.php?opcion=ver_marcas" title="Micas"><img src="vistas/img/menu/marca.png" width="32px"> Marca</a>
          <a class="dropdown-item" href="index.php?opcion=ver_proveedores" title="Audífonos"><img src="vistas/img/menu/proveedor.png" width="32px"> Proveedor</a>
          <a class="dropdown-item" href="index.php?opcion=ver_usuarios" title="Cargadores"><img src="vistas/img/menu/watch_user.png" width="32px"> Usuario</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Productos" style="margin-right: 10vw;"><img src="vistas/img/menu/productos.png" width="32px"><b> Productos</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=celulares" title="Celulares"><img src="vistas/img/menu/celular.png" width="32px"> Celulares</a>
          <a class="dropdown-item" href="index.php?opcion=fundas" title="Fundas"><img src="vistas/img/menu/funda.png" width="32px"> Fundas</a>
          <a class="dropdown-item" href="index.php?opcion=micas" title="Micas"><img src="vistas/img/menu/mica.png" width="32px"> Micas</a>
          <a class="dropdown-item" href="index.php?opcion=audifonos" title="Audífonos"><img src="vistas/img/menu/audifonos.png" width="32px"> Audífonos</a>
          <a class="dropdown-item" href="index.php?opcion=cargadores" title="Cargadores"><img src="vistas/img/menu/cargador.png" width="32px"> Cargadores</a><br>
          <a class="dropdown-item" href="index.php?opcion=todo" title="Todo"><img src="vistas/img/menu/todo.png" width="32px"> Todo</a>
        </div>
      </li>
      
      <ul class="navbar-nav inline">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cuenta"><img src="vistas/img/menu/cuenta.png" width="32px"><b> <?php echo $_SESSION['usuario'];?></b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_perfil" title="Perfil"><img src="vistas/img/menu/user.png" width="32px"> <?php echo $_SESSION['usuario'];?></a>
          <a class="dropdown-item" href="index.php?opcion=cerrar_sesion" title="Cerrar sesión"><img src="vistas/img/menu/register.png" width="32px" style="transform: rotate(200grad);"> Cerrar sesión</a>
        </div>
      </li>
      </ul>

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