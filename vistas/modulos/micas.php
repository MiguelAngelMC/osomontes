<?php
  if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
    <div class="alert alert-primary" role="alert">
        Micas de Cristal
    </div>
    <center>
      <?php

        $resultado = new Controller();
        $resultado -> vistaMicas();

        $paginacion = new Controller();
        $paginacion -> paginacionMicas();

      ?>
    </center>
<?php
  }else{

    echo '<script>
          window.location="index.php?opcion=micas&pagina=1";
        </script>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

  }
?>