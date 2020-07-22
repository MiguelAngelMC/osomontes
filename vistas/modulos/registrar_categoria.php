<center>
  <img src="vistas/img/menu/add_categoria.png" alt="Logo Registrar Categoría" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nombre"><b>Nombre:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nombre" name="nombre" placeholder="Teléfono Celular" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" autofocus="" value="<?php if(isset($_POST['nombre'])){
          echo $_POST['nombre'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre de la categoría (almenos 3 caracteres).
        </div>
      </div>

      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Registrar</button>
      <div style="font-size: 1.08em;">
      <b>¿Ya registraste una categoría?</b> <a href="index.php?opcion=ver_categorias">Ver Categorías</a>
      </div>
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
  $calcular -> registrarCategoriaController(); 

?>