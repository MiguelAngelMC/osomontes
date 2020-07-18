<center>
  <img src="vistas/img/menu/user.png" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="contra">Nueva contraseña:</label>
        <input type="password" class="form-control" id="contra" name="contra" placeholder="********" required="" minlength="3" maxlength="30" autofocus="">
        <div class="invalid-feedback">
        Porfavor ingrese una contraseña.
        </div>
      </div>

      <div class="form-group" title="Mostrar contraseña">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkmostrar" name="checkmostrar" onclick="mostrar()">
          <label class="form-check-label" for="checkmostrar" style="color: black;"> Mostrar contraseña
          </label>
        </div>
      </div>
      <script type="text/javascript">
        function mostrar(){
        var x = document.getElementById("contra");
          if (x.type == "password"){
              x.type = "text";
          } 
          else{
              x.type = "password";
          }
        } 
      </script>

      <button type="submit" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>

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
  $calcular -> cambiarContraController();

?>