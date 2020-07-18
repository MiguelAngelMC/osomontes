<center>
  <img src="vistas/img/menu/addmarca.png" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nvoNombre">Nombre:</label>
        <input type="text" class="form-control" id="nvoNombre" name="nvoNombre" value="<?php if(isset($_GET['nombre'])){
          echo $_GET['nombre'];
        }?>" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" placeholder="José Juan">
        <div class="invalid-feedback">
        Porfavor ingrese el nuevo nombre del proveedor (almenos 3 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="nvosApellidos">Apellidos:</label>
        <input type="text" class="form-control" id="nvosApellidos" name="nvosApellidos" placeholder="Pérez López" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_GET['apellidos'])){
          echo $_GET['apellidos'];
        }?>">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre de la categoría (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="nvaLocali">Localidad:</label>
        <input type="text" class="form-control" id="nvaLocali" name="nvaLocali" placeholder="&#127751; Tepic" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_GET['locali'])){
          echo $_GET['locali'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre de la categoría (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="nvoTel">Teléfono celular:</label>
        <input type="text" class="form-control" id="nvoTel" name="nvoTel" placeholder="&#128241; 3231009892" required="" pattern="\d*" minlength="10" maxlength="10" value="<?php if(isset($_GET['celular_proveedor'])){
          echo $_GET['celular_proveedor'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese su número de teléfono celular.
        </div>
      </div>

      <button type="submit" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>
      <div style="font-size: 1.08em;">
      ¿Ya modificaste un proveedor?&nbsp; <a href="index.php?opcion=ver_proveedores">Ver Proveedores</a>
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

  if(isset($_GET['id_proveedor']) && isset($_GET['nombre']) && isset($_GET['apellidos']) && isset($_GET['locali']) && isset($_GET['celular_proveedor'])){

  $calcular = new Controller();
  $calcular -> editarProveedorController($_GET['id_proveedor'], $_GET['nombre'], $_GET['apellidos'], $_GET['locali'], $_GET['celular_proveedor']);

  }

?>