<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgba(0, 0, 0, 1);">
  <a class="navbar-brand" href="index.php" title="Oso Montes"><img src="vistas/img/logocelosomontes2.png" alt="Logo Oso Montes" width="73vw"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Servicios">
          <img src="vistas/img/menu/herramientas.png" alt="Logo Herramientas" width="32px"><b> Servicios</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Recargas</a>
          <a class="dropdown-item" href="index.php?opcion=desicion3" title="Recargas"><img src="vistas/img/menu/recarga.png" width="32px"> Activar chips</a><br>
          <a class="dropdown-item" href="index.php?opcion=desicion2" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Liberaciones</a>
          <a class="dropdown-item" href="index.php?opcion=desicion2" title="Liberaciones"><img src="vistas/img/menu/liberar.png" width="32px"> Cuenta de Google</a>
        </div>
      </li>
    -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Productos" style="margin-right: 25vw;"><img src="vistas/img/menu/productos.png" alt="Logo Producto" width="32px"><b> Productos</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=celulares&pagina=1" title="Celulares"><img src="vistas/img/menu/celular.png" alt="Logo Celulares" width="32px"> Celulares</a>
          <a class="dropdown-item" href="index.php?opcion=fundas&pagina=1" title="Fundas"><img src="vistas/img/menu/funda.png" alt="Logo Fundas" width="32px"> Fundas</a>
          <a class="dropdown-item" href="index.php?opcion=micas&pagina=1" title="Micas"><img src="vistas/img/menu/mica.png" alt="Logo Micas" width="32px"> Micas</a>
          <a class="dropdown-item" href="index.php?opcion=audifonos&pagina=1" title="Audífonos"><img src="vistas/img/menu/audifonos.png" alt="Logo Audífonos" width="32px"> Audífonos</a>
          <a class="dropdown-item" href="index.php?opcion=cargadores&pagina=1" title="Cargadores"><img src="vistas/img/menu/cargador.png" alt="Logo Cargadores" width="32px"> Cargadores</a><br>
          <a class="dropdown-item" href="index.php?opcion=todo&pagina=1" title="Todo"><img src="vistas/img/menu/todo.png" alt="Logo Todo" width="32px"> Todo</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" title="Carrito de compras" href="index.php?opcion=carrito"><img src="vistas/img/menu/carrito.png" alt="Logo Carrito de Compras" width="32px"><b> Carrito (<?php if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            echo Count($_SESSION['carrito']);
          }
          else{
            echo "0";
          } ?>)</b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <center>
          <button type="submit" class="btn btn-success" style="width: 100%; border-radius: 0;">Ver carrito</button>
          </center>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cuenta" ><img src="vistas/img/menu/cuenta.png" alt="Logo Cuenta" width="32px"><b> <?php echo $_SESSION['usuario'];?></b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?opcion=ver_perfil" title="Perfil"><img src="vistas/img/menu/user.png" alt="Logo Usuario" width="32px"> <?php echo $_SESSION['usuario'];?></a>
          <a class="dropdown-item" onclick="cerrarSesion();" href="#" title="Cerrar sesión"><img src="vistas/img/menu/register.png" alt="Logo Cerrar Sesión" width="32px" style="transform: rotate(200grad);"> Cerrar sesión</a>
        </div>
      </li>

      </ul>
</div>
</nav>
 <center>
 <form style="background-color: rgba(0, 0, 0, 1);">

  
      <div class="offset-1 form-inline">
        <input id="barra" type="search" placeholder="Buscar" aria-label="Search">
      &nbsp;
      <button class="btn btn-primary" style="margin-bottom: 10px;" type="submit">
        <span class="icon-search" title="Buscar"></span>
      </button></div>
   
 
  </form>
 </center>
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
                    (async () => {
                      var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
                      notificacion.play();
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