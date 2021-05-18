<div style="background-color: #f0f2f5;">
<center><a href="index.php"><img src="vistas/img/logocelosomontes2.png" style="margin-top: 3px;" alt="Logo Oso Montes" width="130vw" loading="lazy"></a></center>
<div class="container">
<div class="col-12 col-sm-8 offset-sm-2 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-4 col-xl-4" style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 1.4%; border-radius: 17px; margin-top: 5px; background-color: white;">
  <center><h3><b>Únete a nuestra comunidad</b></h3><h5 style="color: rgb(147,147,147);">Introduce tus datos</h5></center>
  <div class="px-4">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <input type="text" style="border-radius: 17px;" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese su(s) nombre(s) (almenos 3 caracteres).
        </div>
      </div>

      <div class="form-group">
        <input type="text" style="border-radius: 17px;" class="form-control" id="ape" name="ape" placeholder="Apellidos" required="" minlength="6" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese sus apellidos (almenos 6 caracteres).
        </div>
      </div>

      <div class="form-group">
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
        <input type="text" style="border-radius: 17px;" class="form-control" id="tel" name="tel" placeholder="&#128241; Teléfono celular" required="" pattern="\d*" minlength="10" maxlength="10">
        <div class="invalid-feedback">
        Porfavor ingrese su número de teléfono celular.
        </div>
      </div>

      <div class="form-group">
        <input type="text" style="border-radius: 17px;" class="form-control" id="locali" name="locali" placeholder="&#127751; Ciudad / Localidad" required="" minlength="4" maxlength="20">
        <div class="invalid-feedback">
        Porfavor ingrese la ciudad/localidad en la que vive.
        </div>
      </div>

      <div class="form-group">
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
        <input type="text" style="border-radius: 17px;" class="form-control" id="domic" name="domic" placeholder="&#127968; Domicilio" minlength="6" maxlength="40" required="">
        <div class="invalid-feedback">
        Porfavor ingrese el domicilio donde vive.
        </div>
      </div>

      <div class="form-group">
        <input type="text" style="border-radius: 17px;" class="form-control" id="cp" name="cp" placeholder="&#128236; Código Postal (CP)" required="" pattern="\d*" minlength="5" maxlength="5">
        <div class="invalid-feedback">
        Porfavor ingrese el código postal (cp) de donde vive.
        </div>
      </div>

      <div class="form-group">
        <input type="email" style="border-radius: 17px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corre" name="corre" placeholder="✉️ Correo electrónico" required="" maxlength="45">
        <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
        </div>
      </div>

      <div class="form-group">
        <input type="password" style="border-radius: 17px;" class="form-control" id="contra" name="contra" placeholder="🔑 Contraseña" minlength="4" maxlength="20" required="">
        <div class="invalid-feedback">
        Porfavor ingrese su contraseña (almenos 4 caracteres).
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

      <button type="submit" style="border-radius: 17px;" class="btn btn-success btn-lg btn-block"><b>Registrarte</b></button>
      Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.<br>
    </form>
    <div style="font-size: 1.08em;">
      <div class="dropdown-divider"></div>
      <center><b>¿Ya tienes una cuenta?</b></center>
      <button class="btn btn-primary btn-md btn-block" style="border-radius: 17px; margin-top: 5px; margin-bottom: 10px;" onclick="window.location='index.php?opcion=login'"><b>Inicio de Sesión</b></button>
      </div>
  </div>
</div>
</div>
<br><br>
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
  $calcular -> registroController(); 

?>