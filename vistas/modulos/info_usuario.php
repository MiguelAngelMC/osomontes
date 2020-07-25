<center>
  <img src="vistas/img/menu/user.png" alt="Logo Registrar Usuario" width="100vw" style="margin-top: 5px; margin-bottom: 5px;">

    <div style="margin-left: 3%; margin-right: 3%; border-radius: 10px; border: none; box-shadow: 0px 0px 5px 1px black; margin-bottom: 10px;">
      <div class="table-responsive" style="padding: 1%;">
        <table class="table-hover table-sm" style="white-space: nowrap;">
          
          <tr>
            <td><b>#ID:</b></td>
            <td><?php echo $_GET['id_usuario']; ?></td>
          </tr>

          <tr>
            <td><b>Rol:</b></td>
            <td><?php if($_GET['num_rol'] == 1){
              echo 'Administrador';
            }else{
              echo 'Usuario';
            } ?></td>
          </tr>

          <tr>
            <td><b>Estatus:</b></td>
            <td><?php if($_GET['status'] == 'activo'){
              echo '<button class="btn btn-success">Activo</button>';
            }
            else{
              echo '<button class="btn btn-danger">Desactivado</button>';
            } ?></td>
          </tr>

          <tr>
            <td><b>Fecha creación:</b></td>
            <td><?php echo $_GET['fecha'].' '.$_GET['hora']; ?></td>
          </tr>

          <tr>
            <td><b>Última sesión:</b></td>
            <td><?php if($_GET['fecha_ultima_sesion'] == NULL || $_GET['hora_ultima_sesion'] == NULL){
              echo '<button class="btn btn-warning">Nunca ha iniciado sesión</button>';
            }
            else{
              echo '<button class="btn btn-primary">'.$_GET['fecha_ultima_sesion'].' '.$_GET['hora_ultima_sesion'].'</button>';
            } ?></td>
          </tr>

          <tr>
            <td><b>Nombre(s):</b></td>
            <td><?php echo $_GET['nombre']; ?></td>
          </tr>

          <tr>
            <td><b>Apellidos:</b></td>
            <td><?php echo $_GET['apellidos']; ?></td>
          </tr>

          <tr>
            <td><b>Sexo:</b></td>
            <td><?php if($_GET['sexo'] == "Masculino"){
              echo $_GET['sexo'].' ♂️';
            }
            else{
              echo $_GET['sexo'].' ♀️';
            } ?></td>
          </tr>

          <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td><?php echo $_GET['fecha_nac']; ?></td>
          </tr>

          <tr>
            <td><b>Teléfono celular:</b></td>
            <td><?php echo $_GET['celular']; ?></td>
          </tr>

          <tr>
            <td><b>Ciudad / Localidad:</b></td>
            <td><?php echo $_GET['localidad']; ?></td>
          </tr>

          <tr>
            <td><b>Estado:</b></td>
            <td><?php echo $_GET['estado']; ?></td>
          </tr>

          <tr>
            <td><b>Domicilio:</b></td>
            <td><?php echo $_GET['domicilio']; ?></td>
          </tr>

          <tr>
            <td><b>Código Postal (CP):</b></td>
            <td><?php echo $_GET['cp']; ?></td>
          </tr>

          <tr>
            <td><b>Correo electrónico:</b></td>
            <td><?php echo $_GET['correo']; ?></td>
          </tr>

          <tr>
            <td><b>Fecha confirmación:</b></td>
            <td><?php if($_GET['fecha_confirmacion'] == '0000-00-00' || $_GET['hora_confirmacion'] == '00:00'){
              echo '<button class="btn btn-warning">No ha sido confirmada</button>';
            }
            else{
              echo '<button class="btn btn-primary">'.$_GET['fecha_confirmacion'].' '.$_GET['hora_confirmacion'].'</button>';
            } ?></td>
          </tr>

          <tr>
            <td><b>Última modificación:</b></td>
            <td><?php if($_GET['fecha_modificacion'] == NULL || $_GET['hora_modificacion'] == NULL){
              echo '<button class="btn btn-warning">Sin modificaciones</button>';
            }
            else{
              echo '<button class="btn btn-primary">'.$_GET['fecha_modificacion'].' '.$_GET['hora_modificacion'].'</button>';
            } ?></td>
          </tr>

        </table>
      </div>
    </div>
    <img src="vistas/img/deslizar.png" width="40px"><br><br>

      <div style="font-size: 1.08em;">
      <b>¿Ya viste el perfil?</b> <a href="index.php?opcion=ver_usuarios">Ver Usuarios</a>
      </div><br><br>
  </center>