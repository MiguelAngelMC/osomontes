<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="container" style="display: inline-flex;">
      <li class="breadcrumb-item">
        <a href="index.php">
          <span class="icon-home3"></span> Inicio
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <span class="icon-user"></span> Perfil
      </li>
    </div>
  </ol>
</nav>
<div class="col-12 col-sm-8 offset-sm-2 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-4 col-xl-4">
  <div class="px-4">
    <center>
      <?php

        $calcular = new Controller();
        $calcular -> verPerfilController();

      ?>
    </center>
  </div>
</div>