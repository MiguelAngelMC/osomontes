<center>
  <img src="vistas/img/logocelosomontes2.png" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="nombre"><b>Nombre(s):</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nombre" name="nombre" placeholder="Miguel Angel" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese su(s) nombre(s) (almenos 3 caracteres).
        </div>
      </div>
      <div class="form-group">
        <label for="ape"><b>Apellidos:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="ape" name="ape" placeholder="Pérez López" required="" minlength="6" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese sus apellidos (almenos 6 caracteres).
        </div>
      </div>
      <div class="form-group">
        <label for="sexo"><b>Sexo:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="sexo" id="sexo">
          <option value="">👥 Selecciona tu sexo</option>
          <option value="Femenino">Femenino</option>
          <option value="Masculino">Masculino</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione su sexo.
        </div>
      </div>
      <div class="form-group">
        <label for="fecha_nac"><b>Fecha de nacimiento:</b></label>
        <input type="date" style="border-radius: 17px;" class="form-control" max="<?php date_default_timezone_set('America/Mazatlan');
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
      echo $nuevafecha; ?>" value="<?php echo date("Y-m-d",strtotime($nuevafecha."+ 1 days")); ?>" id="fecha_nac" name="fecha_nac" required="" min="18" max="100">
        <div class="invalid-feedback">
        Porfavor ingrese su fecha de nacimiento (debe tener almenos 18 años para registrarse).
        </div>
      </div>
      <div class="form-group">
        <label for="tel"><b>Teléfono celular:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="tel" name="tel" placeholder="&#128241; 3231009892" required="" pattern="\d*" minlength="10" maxlength="10">
        <div class="invalid-feedback">
        Porfavor ingrese su número de teléfono celular.
        </div>
      </div>
      <div class="form-group">
        <label for="locali"><b>Ciudad / Localidad:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="locali" name="locali" placeholder="&#127751; Santiago Ixc." required="" minlength="4" maxlength="20">
        <div class="invalid-feedback">
        Porfavor ingrese la ciudad/localidad en la que vive.
        </div>
      </div>
      <div class="form-group">
        <label for="estado"><b>Estado:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="estado" id="estado">
          <option value="">&#x1F1F2;&#x1F1FD; Selecciona tu estado &#xFE0F;</option>
          <option value="Aguascalientes">Aguascalientes</option>
          <option value="Baja California">Baja California</option>
          <option value="Baja California Sur">Baja California Sur</option>
          <option value="Campeche">Campeche</option>
          <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
          <option value="Colima">Colima</option>
          <option value="Chiapas">Chiapas</option>
          <option value="Chihuahua">Chihuahua</option>
          <option value="Distrito Federal">Distrito Federal</option>
          <option value="Durango">Durango</option>
          <option value="Guanajuato">Guanajuato</option>
          <option value="Guerrero">Guerrero</option>
          <option value="Hidalgo">Hidalgo</option>
          <option value="Jalisco">Jalisco</option>
          <option value="México">México</option>
          <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
          <option value="Morelos">Morelos</option>
          <option value="Nayarit">Nayarit</option>
          <option value="Nuevo León">Nuevo León</option>
          <option value="Oaxaca">Oaxaca</option>
          <option value="Puebla">Puebla</option>
          <option value="Querétaro">Querétaro</option>
          <option value="Quintana Roo">Quintana Roo</option>
          <option value="San Luis Potosí">San Luis Potosí</option>
          <option value="Sinaloa">Sinaloa</option>
          <option value="Sonora">Sonora</option>
          <option value="Tabasco">Tabasco</option>
          <option value="Tamaulipas">Tamaulipas</option>
          <option value="Tlaxcala">Tlaxcala</option>
          <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
          <option value="Yucatán">Yucatán</option>
          <option value="Zacatecas">Zacatecas</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el estado en el que vive.
        </div>
      </div>
      <div class="form-group">
        <label for="domic"><b>Domicilio:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="domic" name="domic" placeholder="&#127968; Amado Nervo #260" minlength="6" maxlength="40" required="">
        <div class="invalid-feedback">
        Porfavor ingrese el domicilio donde vive.
        </div>
      </div>
      <div class="form-group">
        <label for="corre"><b>Correo electrónico:</b></label>
        <input type="email" style="border-radius: 17px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corre" name="corre" placeholder="correo@ejemplo.com" required="" maxlength="45">
        <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
        </div>
      </div>
      <div class="form-group">
        <label for="contra"><b>Contraseña:</b></label>
        <input type="password" style="border-radius: 17px;" class="form-control" id="contra" name="contra" placeholder="********" minlength="4" maxlength="20" required="">
        <div class="invalid-feedback">
        Porfavor ingrese su contraseña (almenos 4 caracteres).
        </div>
      </div>
      
      <div class="form-group" title="Mostrar contraseña">
        <div class="form-check"  >
          <input type="checkbox" class="form-check-input" id="checkbox" onclick="mostrar()">
          <label class="form-check-label" for="mostrar" style="color: black;"> Mostrar contraseña
          </label>
        </div>
      </div>
      <script type="text/javascript">
        function mostrar() {
        var x = document.getElementById("contra");
          if (x.type == "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
        } 
      </script>
      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Registrarte</button>
      Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.<br><br>
      <div style="font-size: 1.08em;">
      <b>¿Ya tienes una cuenta?</b> <a href="index.php?opcion=login">Iniciar Sesión</a>
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
  $calcular -> registroController(); 

?>