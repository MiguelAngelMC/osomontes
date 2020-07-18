<center>
  <img src="vistas/img/menu/add_proveedor.png" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="José Juan" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_POST['nombre'])){
          echo $_POST['nombre'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre del proveedor (almenos 3 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Pérez López" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_POST['apellidos'])){
          echo $_POST['apellidos'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese los apellidos del proveedor (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="locali">Localidad:</label>
        <input type="text" class="form-control" id="locali" name="locali" placeholder="&#127751; Tepic" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_POST['locali'])){
          echo $_POST['locali'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese la localidad del proveedor (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="tel">Teléfono celular:</label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="&#128241; 3231009892" required="" pattern="\d*" minlength="10" maxlength="10" value="<?php if(isset($_POST['tel'])){
          echo $_POST['tel'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el número de teléfono celular del proveedor.
        </div>
      </div>

      <button type="submit" class="btn btn-outline-success btn-lg btn-block">Registrar</button>
      <div style="font-size: 1.08em;">
      ¿Ya registraste un proveedor?&nbsp; <a href="index.php?opcion=ver_proveedores">Ver Proveedores</a>
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
  $calcular -> registrarProveedorController(); 

?>