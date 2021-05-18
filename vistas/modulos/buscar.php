<?php
  if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
    <div class="alert alert-primary" role="alert">
        Resultados de la búsqueda: <?php echo '<b>'.$_GET['s'].'</b>'; ?>
    </div>
    <center>
      <?php

        $resultado = new Controller();
        $resultado -> buscarController($_GET['s']);

        $paginacion = new Controller();
        $paginacion -> paginacionBusqueda($_GET['s']);

      ?>
    </center>
<?php
  }else{

    echo '<script>
          window.location="index.php?opcion=buscar&s='.$_GET['s'].'&pagina=1";
        </script>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

  }
?>