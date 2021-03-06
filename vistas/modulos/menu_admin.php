<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(0, 0, 0, 1);">
  <div class="container">
  <a class="navbar-brand" href="index.php" title="Oso Montes"><img src="vistas/img/logocelosomontes2.png" alt="Logo Oso Montes" width="75vw" loading="lazy">&nbsp;&nbsp;Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Registros"><img src="vistas/img/menu/herramientas.png" alt="Logo Herramientas" width="32px" loading="lazy"><b> Registros</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=registrar_producto" title="Registrar producto"><img src="vistas/img/menu/regarti.png" alt="Logo Registrar Producto" width="32px" loading="lazy"> Registrar producto</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_categoria" title="Registrar categoría"><img src="vistas/img/menu/add_categoria.png" alt="Logo Registrar Categoría" width="32px" loading="lazy"> Registrar categoría</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_marca" title="Registrar marca"><img src="vistas/img/menu/addmarca.png" alt="Logo Registrar Marca" width="32px" loading="lazy"> Registrar marca</a>
          <a class="dropdown-item" href="index.php?opcion=registrar_proveedor" title="Registrar proveedor"><img src="vistas/img/menu/add_proveedor.png" alt="Logo Registrar Proveedor" width="32px" loading="lazy"> Registrar proveedor</a>
          <a class="dropdown-item" href="index.php?opcion=registro_manual" title="Registrar usuario"><img src="vistas/img/menu/add_user.png" alt="Logo Registrar Usuario" width="32px" loading="lazy"> Registrar usuario</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Ver tablas"><img src="vistas/img/menu/tablas.png" alt="Logo Tablas" width="32px" loading="lazy"><b> Ver tablas</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_productos" title="Producto"><img src="vistas/img/menu/productos.png" alt="Logo Producto" width="32px" loading="lazy"> Producto</a>
          <a class="dropdown-item" href="index.php?opcion=ver_categorias" title="Categoría"><img src="vistas/img/menu/categoria.png" alt="Logo Categoría" width="32px" loading="lazy"> Categoría</a>
          <a class="dropdown-item" href="index.php?opcion=ver_marcas" title="Marca"><img src="vistas/img/menu/marca.png" alt="Logo Marca" width="32px" loading="lazy"> Marca</a>
          <a class="dropdown-item" href="index.php?opcion=ver_proveedores" title="Proveedor"><img src="vistas/img/menu/proveedor.png" alt="Logo Proveedor" width="32px" loading="lazy"> Proveedor</a>
          <a class="dropdown-item" href="index.php?opcion=ver_usuarios" title="Usuario"><img src="vistas/img/menu/watch_user.png" alt="Logo Usuario" width="32px" loading="lazy"> Usuario</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Productos" style="margin-right: 10vw;"><img src="vistas/img/menu/productos.png" alt="Logo Producto" width="32px" loading="lazy"><b> Productos</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=celulares&pagina=1" title="Celulares"><img src="vistas/img/menu/celular.png" alt="Logo Celulares" width="32px" loading="lazy"> Celulares</a>
          <a class="dropdown-item" href="index.php?opcion=fundas&pagina=1" title="Fundas"><img src="vistas/img/menu/funda.png" alt="Logo Fundas" width="32px" loading="lazy"> Fundas</a>
          <a class="dropdown-item" href="index.php?opcion=micas&pagina=1" title="Micas"><img src="vistas/img/menu/mica.png" alt="Logo Micas" width="32px" loading="lazy"> Micas</a>
          <a class="dropdown-item" href="index.php?opcion=audifonos&pagina=1" title="Audífonos"><img src="vistas/img/menu/audifonos.png" alt="Logo Audífonos" width="32px" loading="lazy"> Audífonos</a>
          <a class="dropdown-item" href="index.php?opcion=cargadores&pagina=1" title="Cargadores"><img src="vistas/img/menu/cargador.png" alt="Logo Cargadores" width="32px" loading="lazy"> Cargadores</a><br>
          <a class="dropdown-item" href="index.php?opcion=todo&pagina=1" title="Todo&pagina=1"><img src="vistas/img/menu/todo.png" alt="Logo Todo" width="32px" loading="lazy"> Todo</a>
        </div>
      </li>
      
      <ul class="navbar-nav inline">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cuenta"><img src="vistas/img/menu/cuenta.png" alt="Logo Cuenta" width="32px" loading="lazy"><b> <?php echo $_SESSION['usuario'];?></b></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_perfil" title="Perfil"><img src="vistas/img/menu/user.png" alt="Logo Usuario" width="32px" loading="lazy"> <?php echo $_SESSION['usuario'];?></a>
          <a class="dropdown-item" onclick="cerrarSesion();" href="#" title="Cerrar sesión"><img src="vistas/img/menu/register.png" alt="Logo Cerrar Sesión" width="32px" style="transform: rotate(200grad);" loading="lazy"> Cerrar sesión</a>
        </div>
      </li>
      </ul>

      </ul>
</div>
</div>
</nav>
 <center style="background-color: rgba(0, 0, 0, 1);">

  
      <div class="offset-1 form-inline">
        <input id="barra" type="search" placeholder="Buscar" aria-label="Search" style="border-radius: 17px;">
      &nbsp;
      <button class="btn btn-primary" style="margin-bottom: 10px; border-radius: 17px;" onclick="window.location.href='index.php?opcion=buscar&s='+document.getElementById('barra').value+'&pagina=1';" id="boton">
        <span class="icon-search" title="Buscar"></span>
      </button></div>
   
  
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
<script type="text/javascript">
  function cerrarSesion(){
            Swal.fire({
              title: 'Desea salir?',
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: "Cancelar",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, cerrar sesión!'
            }).then((result) => {
              if (result.value) {
                var ajax = new XMLHttpRequest();
                ajax.open('GET', 'index.php?opcion=cerrar_sesion', true);
                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                ajax.onreadystatechange = function (){
                  // Comprobar si se ejecutó correctamente
                  if (this.readyState == 4 && this.status == 200) {
                    var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
                    notificacion.play();

                    (async () => {
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
                  }
                }
                ajax.send();
                
              }
            })
          };
</script>