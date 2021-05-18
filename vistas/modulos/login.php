<div style="background-color: #e9ebee;">
<center><a href="index.php"><img src="vistas/img/logocelosomontes2.png" style="margin-top: 3px;" alt="Logo Oso Montes" width="130vw" loading="lazy"></a></center>
<div class="container">
<div class="col-12 col-sm-8 offset-sm-2 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-4 col-xl-4" style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding-top: 10px; padding-bottom: 15px; border-radius: 17px; margin-top: 5px; background-color: white;">
  <center><h3>Inicia sesión</h3></center>
  <div class="px-4">
    <form method="POST" class="needs-validation" novalidate>

      <div class="form-group" title="Correo electrónico">
          <input type="email" style="border-radius: 17px; padding: 23px; font-size: 1.08em;" placeholder="✉️ Correo electrónico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corr" name="corre" required="" autofocus="true" maxlength="45" value="<?php if(isset($_POST['corre'])){
            echo $_POST['corre'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
        </div>
      </div>

      <div class="form-group" title="Contraseña">
          <input type="password" placeholder="🔑 Contraseña" style="border-radius: 17px; padding: 23px; font-size: 1.08em;" class="form-control" id="contra" name="contra" minlength="4" maxlength="20" required="" value="<?php if(isset($_POST['corre'])){
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

      <button type="submit" style="border-radius: 17px;" class="btn btn-primary btn-lg btn-block" title="Entrar"><b>Iniciar sesión</b></button>

    </form>

    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="index.php?opcion=olvidada" style="text-align: center; color: #007bff; font-size: 1.08em;" title="¿Olvidaste tu contraseña?">¿Olvidaste tu contraseña?</a>
    <div class="dropdown-divider"></div>

    <!-- <div style="font-size: 1.08em; margin-top: 2px; margin-bottom: 5px; text-align: center;">
      <b>¿No tienes una cuenta?</b>
    </div> -->
    <button style="border-radius: 17px; font-size: 1.08em; margin-bottom: 10px;" class="btn btn-success btn-md btn-block" onclick="window.location='index.php?opcion=registro'"><b>Crear cuenta nueva</b></button>

  </div>
</div>
</div>
<br><br><br><br><br>
</div>
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