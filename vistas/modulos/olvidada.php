<center>
  <img src="vistas/img/logocelosomontes2.png" width="100vw" style="margin-top: 10px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <form method="POST" class="needs-validation" novalidate>
      <div class="form-group" title="Correo electrónico">
        <label for="corr">Correo electrónico:</label>
        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corr" name="corre" placeholder="correo@ejemplo.com" required="" maxlength="45">
        <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
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
      <button type="submit" class="btn btn-outline-primary btn-lg btn-block" title="Enviar">Enviar</button>
    </form>
    <div style="font-size: 1.08em; margin-top: 2px;">
      ¿No tienes una cuenta?&nbsp; <a href="index.php?opcion=registro" title="Crear cuenta nueva">Crear cuenta nueva</a>
    </div>
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
  $calcular -> olvidadaController(); 

?>