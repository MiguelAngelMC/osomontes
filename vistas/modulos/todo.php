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
            <span class="icon-dropbox"></span> Todos los productos
          </li>
        </div>
      </ol>
    </nav>
    <center>
      <?php

        $resultado = new Controller();
        $resultado -> vistaTodo();

        $paginacion = new Controller();
        $paginacion -> paginacionTodo();

      ?>
    </center>
<?php
  }else{

    echo '<script>
          window.location="index.php?opcion=todo&pagina=1";
        </script>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

  }
?>