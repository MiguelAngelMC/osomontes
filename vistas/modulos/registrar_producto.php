<center>
  <img src="vistas/img/menu/regarti.png" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="estado">Categoría:</label>
        <select class="form-control" required="true" name="categoria" id="categoria">
          <option value="">Selecciona la categoría</option>
          <?php

            $link = new Controller();
            $link -> vistaSelectCategorias();

          ?>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione la categoría del producto.
        </div>
      </div>
      
      <div class="form-group">
        <label for="estado">Marca:</label>
        <select class="form-control" required="true" name="marca" id="marca">
          <option value="">Selecciona la marca</option>
          <?php

            $link = new Controller();
            $link -> vistaSelectMarcas();

          ?>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione la marca del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="proveedor">Proveedor:</label>
        <select class="form-control" required="true" name="proveedor" id="proveedor">
          <option value="">Selecciona el proveedor</option>
          <?php

            $link = new Controller();
            $link -> vistaSelectProveedores();

          ?>
        </select>
        <div class="invalid-feedback">
        Porfavor seleccione el proveedor del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="locali">Foto:</label>
        <input type="file" class="form-control" id="locali" name="locali" required="">
        <div class="invalid-feedback">
        Porfavor ingrese una foto del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="iPhone 11 Pro" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre del producto (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="32 GB, 2 GB de RAM Pantalla de 6.2 pulgadas HD + Infinity-V Cámara trasera dual de 13 MP + 2 MP + cámara frontal de 8 MP" required="" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" minlength="10" maxlength="1000" rows="6"></textarea>
        <div class="invalid-feedback">
        Porfavor ingrese la descripción del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="imei">IMEI:</label>
        <input type="text" class="form-control" id="imei" name="imei" placeholder="&#128241; 323100989215365" pattern="\d*" minlength="15" maxlength="15">
        <div class="invalid-feedback">
        Porfavor ingrese el IMEI del teléfono celular.
        </div>
      </div>

      <div class="form-group">
        <label for="precio_venta">Precio de venta:</label><br>
        <input type="number" placeholder="$" name="precio_venta" id="precio_venta" class="form-control" required="" min="1" max="1000000" step="0.01">
        <div class="invalid-feedback">
        Porfavor ingrese el precio del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="precio_compra">Precio de compra:</label><br>
        <input type="number" placeholder="$" name="precio_compra" id="precio_compra" class="form-control" required="" min="1" max="1000000" step="0.01">
        <div class="invalid-feedback">
        Porfavor ingrese el precio del producto.
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

      <button type="submit" class="btn btn-outline-success btn-lg btn-block">Registrar</button>
      <div style="font-size: 1.08em;">
      ¿Ya registraste un producto?&nbsp; <a href="index.php?opcion=login">Ver Productos</a>
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
  $calcular -> registrarProductoController();

?>