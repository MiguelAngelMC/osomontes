<center>
  <img src="vistas/img/menu/add_user.png" alt="Logo Registrar Usuario" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nombre"><b>Nombre(s):</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nombre" name="nombre" placeholder="Juan" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_POST['nombre'])){
            echo $_POST['nombre'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el/los nombre(s) del usuario (almenos 3 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="ape"><b>Apellidos:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="ape" name="ape" placeholder="Pérez López" required="" minlength="6" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_POST['ape'])){
            echo $_POST['ape'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese los apellidos del usuario (almenos 6 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="sexo"><b>Sexo:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="sexo" id="sexo">
          <option value="">👥 Selecciona tu sexo</option>
          <option value="Femenino" <?php if(isset($_POST['sexo']) && $_POST['sexo'] == 'Femenino'){
            echo 'selected="selected"';
          } ?>>Femenino</option>
          <option value="Masculino" <?php if(isset($_POST['sexo']) && $_POST['sexo'] == 'Masculino'){
            echo 'selected="selected"';
          } ?>>Masculino</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el sexo del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="fecha_nac"><b>Fecha de nacimiento:</b></label>
        <input type="date" style="border-radius: 17px;" class="form-control" max="<?php date_default_timezone_set('America/Mazatlan');
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
      echo $nuevafecha; ?>" value="<?php if(isset($_POST['fecha_nac'])){
            echo $_POST['fecha_nac'];
          }
          else{
            echo date("Y-m-d",strtotime($nuevafecha."+ 1 days")); 
          } ?>" id="fecha_nac" name="fecha_nac" required="" min="18" max="100">
        <div class="invalid-feedback">
        Porfavor ingrese la fecha de nacimiento del usuario (debe tener almenos 18 años para registrarse).
        </div>
      </div>

      <div class="form-group">
        <label for="tel"><b>Teléfono celular:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="tel" name="tel" placeholder="&#128241; 3231009892" required="" pattern="\d*" minlength="10" maxlength="10" value="<?php if(isset($_POST['tel'])){
            echo $_POST['tel'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el número de teléfono celular del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="locali"><b>Ciudad / Localidad:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="locali" name="locali" placeholder="&#127751; Santiago Ixc." required="" minlength="4" maxlength="20" value="<?php if(isset($_POST['locali'])){
            echo $_POST['locali'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese la ciudad/localidad del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="estado"><b>Estado:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="estado" id="estado">
          <option value="">&#x1F1F2;&#x1F1FD; Selecciona tu estado &#xFE0F;</option>
          <option value="Aguascalientes" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Aguascalientes')){
            echo 'selected="selected"';
          }?>>Aguascalientes</option>
          <option value="Baja California" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Baja California')){
            echo 'selected="selected"';
          }?>>Baja California</option>
          <option value="Baja California Sur" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Baja California Sur')){
            echo 'selected="selected"';
          }?>>Baja California Sur</option>
          <option value="Campeche" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Campeche')){
            echo 'selected="selected"';
          }?>>Campeche</option>
          <option value="Coahuila de Zaragoza" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Coahuila de Zaragoza')){
            echo 'selected="selected"';
          }?>>Coahuila de Zaragoza</option>
          <option value="Colima" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Colima')){
            echo 'selected="selected"';
          }?>>Colima</option>
          <option value="Chiapas" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Chiapas')){
            echo 'selected="selected"';
          }?>>Chiapas</option>
          <option value="Chihuahua" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Chihuahua')){
            echo 'selected="selected"';
          }?>>Chihuahua</option>
          <option value="Distrito Federal" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Distrito Federal')){
            echo 'selected="selected"';
          }?>>Distrito Federal</option>
          <option value="Durango" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Durango')){
            echo 'selected="selected"';
          }?>>Durango</option>
          <option value="Guanajuato" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Guanajuato')){
            echo 'selected="selected"';
          }?>>Guanajuato</option>
          <option value="Guerrero" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Guerrero')){
            echo 'selected="selected"';
          }?>>Guerrero</option>
          <option value="Hidalgo" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Hidalgo')){
            echo 'selected="selected"';
          }?>>Hidalgo</option>
          <option value="Jalisco" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Jalisco')){
            echo 'selected="selected"';
          }?>>Jalisco</option>
          <option value="México" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'México')){
            echo 'selected="selected"';
          }?>>México</option>
          <option value="Michoacán de Ocampo" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Michoacán de Ocampo')){
            echo 'selected="selected"';
          }?>>Michoacán de Ocampo</option>
          <option value="Morelos" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Morelos')){
            echo 'selected="selected"';
          }?>>Morelos</option>
          <option value="Nayarit" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Nayarit')){
            echo 'selected="selected"';
          }?>>Nayarit</option>
          <option value="Nuevo León" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Nuevo León')){
            echo 'selected="selected"';
          }?>>Nuevo León</option>
          <option value="Oaxaca" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Oaxaca')){
            echo 'selected="selected"';
          }?>>Oaxaca</option>
          <option value="Puebla" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Puebla')){
            echo 'selected="selected"';
          }?>>Puebla</option>
          <option value="Querétaro" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Querétaro')){
            echo 'selected="selected"';
          }?>>Querétaro</option>
          <option value="Quintana Roo" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Quintana Roo')){
            echo 'selected="selected"';
          }?>>Quintana Roo</option>
          <option value="San Luis Potosí" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'San Luis Potosí')){
            echo 'selected="selected"';
          }?>>San Luis Potosí</option>
          <option value="Sinaloa" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Sinaloa')){
            echo 'selected="selected"';
          }?>>Sinaloa</option>
          <option value="Sonora" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Sonora')){
            echo 'selected="selected"';
          }?>>Sonora</option>
          <option value="Tabasco" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Tabasco')){
            echo 'selected="selected"';
          }?>>Tabasco</option>
          <option value="Tamaulipas" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Tamaulipas')){
            echo 'selected="selected"';
          }?>>Tamaulipas</option>
          <option value="Tlaxcala" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Tlaxcala')){
            echo 'selected="selected"';
          }?>>Tlaxcala</option>
          <option value="Veracruz de Ignacio de la Llave" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Veracruz de Ignacio de la Llave')){
            echo 'selected="selected"';
          }?>>Veracruz de Ignacio de la Llave</option>
          <option value="Yucatán" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Yucatán')){
            echo 'selected="selected"';
          }?>>Yucatán</option>
          <option value="Zacatecas" <?php if(isset($_POST['estado']) && ($_POST['estado'] == 'Zacatecas')){
            echo 'selected="selected"';
          }?>>Zacatecas</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el estado del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="domic"><b>Domicilio:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="domic" name="domic" placeholder="&#127968; Amado Nervo #260" minlength="6" maxlength="40" required="" value="<?php if(isset($_POST['domic'])){
            echo $_POST['domic'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el domicilio del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="cp"><b>Código Postal (CP):</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="cp" name="cp" placeholder="&#128236; 63500" required="" pattern="\d*" minlength="5" maxlength="5" value="<?php if(isset($_POST['cp'])){
            echo $_POST['cp'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el código postal (cp) de donde vive.
        </div>
      </div>

      <div class="form-group">
        <label for="corre"><b>Correo electrónico:</b></label>
        <input type="email" style="border-radius: 17px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="corre" name="corre" placeholder="correo@ejemplo.com" required="" maxlength="45" value="<?php if(isset($_POST['corre'])){
            echo $_POST['corre'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el correo electrónico del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="contra"><b>Contraseña:</b></label>
        <input type="password" style="border-radius: 17px;" class="form-control" id="contra" name="contra" placeholder="********" minlength="4" maxlength="20" required="" value="<?php if(isset($_POST['contra'])){
            echo $_POST['contra'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese la contraseña del usuario (almenos 4 caracteres).
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

      <div class="form-group">
        <label for="rol"><b>Rol:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="rol" id="rol">
          <option value="">Selecciona el rol</option>
          <option value="1" <?php if(isset($_POST['rol']) && $_POST['rol'] == 1){
            echo 'selected="selected"';
          } ?>>Administrador</option>
          <option value="2" <?php if(isset($_POST['rol']) && $_POST['rol'] == 2){
            echo 'selected="selected"';
          } ?>>Usuario</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el rol del usuario.
        </div>
      </div>

      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Registrar usuario</button>
      <div style="font-size: 1.08em;">
      <b>¿Ya registraste un usuario?</b> <a href="index.php?opcion=ver_usuarios">Ver Usuarios</a>
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
  $calcular -> registroManualController(); 

?>