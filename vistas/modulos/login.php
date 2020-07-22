<center>
  <img src="vistas/img/logocelosomontes2.png" width="100vw" style="margin-top: 10px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <form method="POST" class="needs-validation" novalidate>
      <div class="form-group" title="Correo electrónico">
        <label for="corr"><b>Correo electrónico:</b></label>
        <input type="email" style="border-radius: 17px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corr" name="corre" required="" maxlength="45" value="<?php if(isset($_POST['corre'])){
          echo $_POST['corre'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
        </div>
      </div>
      <div class="form-group" title="Contraseña">
        <label for="contra"><b>Contraseña:</b></label>
        <input type="password" style="border-radius: 17px;" class="form-control" id="contra" name="contra" minlength="4" maxlength="20" required="" value="<?php if(isset($_POST['corre'])){
          echo $_POST['contra'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese su contraseña.
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
      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-primary btn-lg btn-block" title="Entrar">Entrar</button>
    </form>
    <div style="font-size: 1.08em; margin-top: 2px;">
      <b>¿No tienes una cuenta?</b> <a href="index.php?opcion=registro" title="Crear cuenta nueva">Crear cuenta nueva</a>
    </div>
  </div>
</div>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="index.php?opcion=olvidada" style="text-align: center; color: #007bff;" title="¿Olvidaste tu contraseña?">¿Olvidaste tu contraseña?</a>
  <div class="dropdown-divider"></div>
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
  $calcular -> loginController(); 

?>