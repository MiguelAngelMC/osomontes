<center>
  <img src="vistas/img/menu/regarti.png" alt="Logo Registrar Producto" width="100vw" style="margin-top: 25px;">
</center>
<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" enctype="multipart/form-data" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="categoria"><b>Categoría:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="categoria" id="categoria">
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

      <script type="text/javascript">
        // Mostrar el campo de imei o no
        function seleccion(){
          div = document.getElementById('group__imei');
          val = document.getElementById('categoria').value;
          imei = document.getElementById('imei'); 
          if((val == "Teléfono Celular") || (val == "Teléfono de Casa")){
            div.setAttribute("style", "display: block;");
            imei.required = true;
          }
          else{
            div.setAttribute("style", "display: none;");
          }
        }
      </script>

      <div class="form-group" style="display: none" id="group__imei">
        <label for="imei"><b>IMEI:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="imei" name="imei" placeholder="&#128241; 123456789101112" pattern="\d*" minlength="15" maxlength="15">
        <div class="invalid-feedback">
        Porfavor ingrese el IMEI del teléfono celular.
        </div>
      </div>
      
      <div class="form-group">
        <label for="marca"><b>Marca:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="marca" id="marca">
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
        <label for="proveedor"><b>Proveedor:</b></label>
        <select class="form-control" style="border-radius: 17px;" required="true" name="proveedor" id="proveedor">
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
        <label for="foto"><b>Foto:</b></label>
        <input type="file" style="border-radius: 17px;" class="form-control" id="foto" name="foto" required="">
        <div class="invalid-feedback">
        Porfavor ingrese una foto del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="nombre"><b>Nombre:</b></label>
        <input type="text" style="border-radius: 17px;" class="form-control" id="nombre" name="nombre" placeholder="iPhone 11 Pro" required="" minlength="3" maxlength="30" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+">
        <div class="invalid-feedback">
        Porfavor ingrese el nombre del producto (almenos 4 caracteres).
        </div>
      </div>

      <div class="form-group">
        <label for="descripcion"><b>Descripción:</b></label>
        <textarea type="text" style="border-radius: 5px;" class="form-control" id="descripcion" name="descripcion" placeholder="32 GB, 2 GB de RAM Pantalla de 6.2 pulgadas HD + Infinity-V Cámara trasera dual de 13 MP + 2 MP + cámara frontal de 8 MP" required="" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+" minlength="10" maxlength="1000" rows="6"></textarea>
        <div class="invalid-feedback">
        Porfavor ingrese la descripción del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="precio_venta"><b>Precio de venta:</b></label><br>
        <input type="number" style="border-radius: 17px;" placeholder="$" name="precio_venta" id="precio_venta" class="form-control" required="" min="1" max="1000000" step="0.01">
        <div class="invalid-feedback">
        Porfavor ingrese el precio del producto.
        </div>
      </div>

      <div class="form-group">
        <label for="precio_compra"><b>Precio de compra:</b></label><br>
        <input type="number" style="border-radius: 17px;" placeholder="$" name="precio_compra" id="precio_compra" class="form-control" required="" min="1" max="1000000" step="0.01">
        <div class="invalid-feedback">
        Porfavor ingrese el precio del producto.
        </div>
      </div>

      <button type="submit" style="border-radius: 17px;" class="btn btn-outline-success btn-lg btn-block">Registrar</button>
      <div style="font-size: 1.08em;">
      <b>¿Ya registraste un producto?</b> <a href="index.php?opcion=login">Ver Productos</a>
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