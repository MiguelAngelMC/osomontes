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
        <span class="icon-mobile"></span> Cambiar número
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
        <label for="nvoTel"><b>Teléfono Celular:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvoTel" name="nvoTel" value="<?php echo $_SESSION['celular']; ?>" required="" minlength="10" maxlength="10" pattern="\d*">
        <div class="invalid-feedback">
        Porfavor ingrese un número de teléfono celular.
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
  $calcular -> cambiarCelularController(); 

?>