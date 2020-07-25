<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nvoNombre"><b>Nombre(s):</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvoNombre" name="nvoNombre" placeholder="Miguel Angel" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_GET['nombre'])){
          echo $_GET['nombre'];
        }?>">
        <div class="invalid-feedback">
        Porfavor ingrese el/los nombre(s) del usuario (almenos 3 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="nvosApellidos"><b>Apellidos:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvosApellidos" name="nvosApellidos" placeholder="Pérez López" required="" minlength="6" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" value="<?php if(isset($_GET['apellidos'])){
          echo $_GET['apellidos'];
        }?>">
        <div class="invalid-feedback">
        Porfavor ingrese los apellidos del usuario (almenos 6 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="nvoSexo"><b>Sexo:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="nvoSexo" id="nvoSexo">
          <option value="">👥 Selecciona el sexo</option>
          <option value="Femenino" <?php if(isset($_GET['sexo']) && ($_GET['sexo'] == 'Femenino')){
          echo 'selected="selected"';
        }?>>Femenino</option>
          <option value="Masculino" <?php if(isset($_GET['sexo']) && ($_GET['sexo'] == 'Masculino')){
          echo 'selected="selected"';
        }?>>Masculino</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el sexo del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvaFecha_nac"><b>Fecha de nacimiento:</b></label>
        <input type="date" style="border-radius: 17px;" class="form-control" max="<?php date_default_timezone_set('America/Mazatlan');
      $fecha = date('Y-m-d');
      $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
      echo $nuevafecha; ?>" value="<?php if(isset($_GET['fecha_nac'])){
          echo $_GET['fecha_nac'];
        }?>" id="nvaFecha_nac" name="nvaFecha_nac" required="" min="18" max="100">
        <div class="invalid-feedback">
        Porfavor ingrese la fecha de nacimiento del usuario (debe tener almenos 18 años para registrarse).
        </div>
      </div>

      <div class="form-group">
        <label for="nvoTel"><b>Teléfono celular:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvoTel" name="nvoTel" placeholder="&#128241; 3231009892" required="" pattern="\d*" minlength="10" maxlength="10" value="<?php if(isset($_GET['celular'])){
          echo $_GET['celular'];
        }?>">
        <div class="invalid-feedback">
        Porfavor ingrese el número de teléfono celular del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvaLocali"><b>Ciudad / Localidad:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvaLocali" name="nvaLocali" placeholder="&#127751; Santiago Ixc." required="" minlength="4" maxlength="20" value="<?php if(isset($_GET['localidad'])){
          echo $_GET['localidad'];
        }?>">
        <div class="invalid-feedback">
        Porfavor ingrese la ciudad/localidad del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvoEstado"><b>Estado:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="nvoEstado" id="nvoEstado">
          <option value="">&#x1F1F2;&#x1F1FD; Selecciona el estado &#xFE0F;</option>
          <option value="Aguascalientes" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Aguascalientes')){
            echo 'selected="selected"';
          }?>>Aguascalientes</option>
          <option value="Baja California" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Baja California')){
            echo 'selected="selected"';
          }?>>Baja California</option>
          <option value="Baja California Sur" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Baja California Sur')){
            echo 'selected="selected"';
          }?>>Baja California Sur</option>
          <option value="Campeche" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Campeche')){
            echo 'selected="selected"';
          }?>>Campeche</option>
          <option value="Coahuila de Zaragoza" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Coahuila de Zaragoza')){
            echo 'selected="selected"';
          }?>>Coahuila de Zaragoza</option>
          <option value="Colima" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Colima')){
            echo 'selected="selected"';
          }?>>Colima</option>
          <option value="Chiapas" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Chiapas')){
            echo 'selected="selected"';
          }?>>Chiapas</option>
          <option value="Chihuahua" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Chihuahua')){
            echo 'selected="selected"';
          }?>>Chihuahua</option>
          <option value="Distrito Federal" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Distrito Federal')){
            echo 'selected="selected"';
          }?>>Distrito Federal</option>
          <option value="Durango" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Durango')){
            echo 'selected="selected"';
          }?>>Durango</option>
          <option value="Guanajuato" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Guanajuato')){
            echo 'selected="selected"';
          }?>>Guanajuato</option>
          <option value="Guerrero" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Guerrero')){
            echo 'selected="selected"';
          }?>>Guerrero</option>
          <option value="Hidalgo" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Hidalgo')){
            echo 'selected="selected"';
          }?>>Hidalgo</option>
          <option value="Jalisco" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Jalisco')){
            echo 'selected="selected"';
          }?>>Jalisco</option>
          <option value="México" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'México')){
            echo 'selected="selected"';
          }?>>México</option>
          <option value="Michoacán de Ocampo" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Michoacán de Ocampo')){
            echo 'selected="selected"';
          }?>>Michoacán de Ocampo</option>
          <option value="Morelos" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Morelos')){
            echo 'selected="selected"';
          }?>>Morelos</option>
          <option value="Nayarit" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Nayarit')){
            echo 'selected="selected"';
          }?>>Nayarit</option>
          <option value="Nuevo León" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Nuevo León')){
            echo 'selected="selected"';
          }?>>Nuevo León</option>
          <option value="Oaxaca" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Oaxaca')){
            echo 'selected="selected"';
          }?>>Oaxaca</option>
          <option value="Puebla" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Puebla')){
            echo 'selected="selected"';
          }?>>Puebla</option>
          <option value="Querétaro" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Querétaro')){
            echo 'selected="selected"';
          }?>>Querétaro</option>
          <option value="Quintana Roo" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Quintana Roo')){
            echo 'selected="selected"';
          }?>>Quintana Roo</option>
          <option value="San Luis Potosí" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'San Luis Potosí')){
            echo 'selected="selected"';
          }?>>San Luis Potosí</option>
          <option value="Sinaloa" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Sinaloa')){
            echo 'selected="selected"';
          }?>>Sinaloa</option>
          <option value="Sonora" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Sonora')){
            echo 'selected="selected"';
          }?>>Sonora</option>
          <option value="Tabasco" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Tabasco')){
            echo 'selected="selected"';
          }?>>Tabasco</option>
          <option value="Tamaulipas" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Tamaulipas')){
            echo 'selected="selected"';
          }?>>Tamaulipas</option>
          <option value="Tlaxcala" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Tlaxcala')){
            echo 'selected="selected"';
          }?>>Tlaxcala</option>
          <option value="Veracruz de Ignacio de la Llave" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Veracruz de Ignacio de la Llave')){
            echo 'selected="selected"';
          }?>>Veracruz de Ignacio de la Llave</option>
          <option value="Yucatán" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Yucatán')){
            echo 'selected="selected"';
          }?>>Yucatán</option>
          <option value="Zacatecas" <?php if(isset($_GET['estado']) && ($_GET['estado'] == 'Zacatecas')){
            echo 'selected="selected"';
          }?>>Zacatecas</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el estado del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvoDomic"><b>Domicilio:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvoDomic" name="nvoDomic" placeholder="&#127968; Amado Nervo #260" minlength="6" maxlength="40" required="" value="<?php if(isset($_GET['domicilio'])){
          echo $_GET['domicilio'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el domicilio del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvoCp"><b>Código Postal (CP):</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nvoCp" name="nvoCp" placeholder="&#128236; 63500" required="" pattern="\d*" minlength="5" maxlength="5" value="<?php if(isset($_GET['cp'])){
            echo $_GET['cp'];
          } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el código postal (cp) de donde vive.
        </div>
      </div>

      <div class="form-group">
        <label for="nvoCorre"><b>Correo electrónico:</b></label>
        <input type="email" style="border-radius: 17px;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="nvoCorre" name="nvoCorre" placeholder="correo@ejemplo.com" required="" maxlength="45" value="<?php if(isset($_GET['correo'])){
          echo $_GET['correo'];
        } ?>">
        <div class="invalid-feedback">
        Porfavor ingrese el correo electrónico del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvaContra"><b>Contraseña:</b></label>
        <input type="password" style="border-radius: 17px;" class="form-control" id="nvaContra" name="nvaContra" placeholder="********" minlength="4" maxlength="20" required="">
        <div class="invalid-feedback">
        Porfavor ingrese una nueva contraseña para el usuario (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group" title="Mostrar contraseña">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox" onclick="mostrar()">
          <label class="form-check-label" for="mostrar" style="color: black;"> Mostrar contraseña
          </label>
        </div>
      </div>

      <div class="form-group">
        <label for="nvoStatus"><b>Estatus:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="nvoStatus" id="nvoStatus">
          <option value="">Selecciona el estatus</option>
          <option value="activo" <?php if(isset($_GET['status']) && ($_GET['status'] == 'activo')){
          echo 'selected="selected"';
        }?>>Activo</option>
          <option value="desactivado" <?php if(isset($_GET['status']) && ($_GET['status'] == 'desactivado')){
          echo 'selected="selected"';
        }?>>Desactivado</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el estatus del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvoRol"><b>Rol:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="nvoRol" id="nvoRol">
          <option value="">Selecciona el rol</option>
          <option value="1" <?php if(isset($_GET['num_rol']) && ($_GET['num_rol'] == '1')){
          echo 'selected="selected"';
        }?>>Administrador</option>
          <option value="2" <?php if(isset($_GET['num_rol']) && ($_GET['num_rol'] == '2')){
          echo 'selected="selected"';
        }?>>Usuario</option>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el rol del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvaFecha_confirmacion"><b>Fecha de confirmación:</b></label>
        <input type="date" style="border-radius: 17px;" class="form-control" max="<?php date_default_timezone_set('America/Mazatlan');
      $fecha = date('Y-m-d');
      echo $fecha; ?>" value="<?php if(isset($_GET['fecha_confirmacion'])){
          echo $_GET['fecha_confirmacion'];
        }?>" id="nvaFecha_confirmacion" name="nvaFecha_confirmacion" required="">
        <div class="invalid-feedback">
        Porfavor ingrese la fecha de confirmación del usuario.
        </div>
      </div>

      <div class="form-group">
        <label for="nvaHora_confirmacion"><b>Hora de confirmación:</b></label>
        <input type="time" style="border-radius: 17px;" class="form-control" value="<?php if(isset($_GET['hora_confirmacion'])){
          echo $_GET['hora_confirmacion'];
        }?>" id="nvaHora_confirmacion" name="nvaHora_confirmacion" required="">
        <div class="invalid-feedback">
        Porfavor ingrese la hora de confirmación del usuario.
        </div>
      </div>

      <script type="text/javascript">
        function mostrar() {
        var x = document.getElementById("nvaContra");
          if (x.type == "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
        } 
      </script>
      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>
      <div style="font-size: 1.08em;">
      ¿Ya editaste un usuario?&nbsp; <a href="index.php?opcion=ver_usuarios">Ver Usuarios</a>
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

  if(isset($_GET['id_usuario']) && isset($_GET['nombre']) && isset($_GET['apellidos']) && isset($_GET['sexo']) && isset($_GET['fecha_nac']) && isset($_GET['celular']) && isset($_GET['localidad']) && isset($_GET['estado']) && isset($_GET['domicilio']) && isset($_GET['cp']) && isset($_GET['correo']) && isset($_GET['status']) && isset($_GET['num_rol']) && isset($_GET['fecha_confirmacion']) && isset($_GET['hora_confirmacion'])){

    $datosUsuario = array('valor_id'=>$_GET['id_usuario'], 'valor_nombre'=>$_GET['nombre'], 'valor_apellidos'=>$_GET['apellidos'], 'valor_sexo'=>$_GET['sexo'], 'valor_fecha_nac'=>$_GET['fecha_nac'], 'valor_celular'=>$_GET['celular'], 'valor_localidad'=>$_GET['localidad'], 'valor_estado'=>$_GET['estado'], 'valor_domicilio'=>$_GET['domicilio'], 'valor_cp'=>$_GET['cp'], 'valor_correo'=>$_GET['correo'], 'valor_status'=>$_GET['status'], 'valor_num_rol'=>$_GET['num_rol'], 'valor_fecha_confirmacion'=>$_GET['fecha_confirmacion'], 'valor_hora_confirmacion'=>$_GET['hora_confirmacion']);

    $calcular = new Controller();
    $calcular -> editarUsuarioController($datosUsuario);

  }

?>