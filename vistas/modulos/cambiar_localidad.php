<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="container" style="display: inline-flex; white-space: nowrap;">
      <li class="breadcrumb-item">
        <a href="index.php">
          <span class="icon-home3"></span> Inicio
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?opcion=ver_perfil">
          <span class="icon-user"></span> Perfil
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <span class="icon-office"></span> Cambiar localidad
      </li>
    </div>
  </ol>
</nav>
<center>
  <img src="vistas/img/menu/user.png" width="100vw">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nvaLocali"><b>Localidad:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvaLocali" name="nvaLocali" value="<?php echo $_SESSION['localidad']; ?>" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese un nombre.
        </div>
      </div>

      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>

    </form>
  </div>
</div>
<br><br>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<?php

  $calcular = new Controller();
  $calcular -> cambiarLocalidadController(); 

?>