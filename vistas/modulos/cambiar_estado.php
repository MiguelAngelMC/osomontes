<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="container" style="display: inline-flex; white-space: nowrap;">
      <li class="breadcrumb-item">
        <a href="index.php">
          <span class="icon-home3"></span> Inicio
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?opcion=ver_perfil">
          <span class="icon-user"></span> Perfil
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <span class="icon-office"></span> Cambiar estado
      </li>
    </div>
  </ol>
</nav>
<center>
  <img src="vistas/img/menu/user.png" width="100vw">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
              <label for="nvoEstado"><b>Estado:</b></label>
              <select class="form-control" style="border-radius: 17px;" required="true" name="nvoEstado" id="nvoEstado">
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

      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>
      
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
  $calcular -> cambiarEstadoController(); 

?>