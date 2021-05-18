<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="container" style="display: inline-flex;">
      <li class="breadcrumb-item active" aria-current="page">
        <span class="icon-stats-dots"></span> Dashboard
      </li>
    </div>
  </ol>
</nav>
<div style="display: flex; flex-wrap: wrap; justify-content: center;" class="container">
	<div style="color: black; box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #45a2e1; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-user" style="font-size: 1.5em;"></span>
			<h5>Usuarios</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarUsuariosController();

			?></b>
			</h2>
		</center>
	</div>
	<div style="color: black; white-space: nowrap; box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #25cf4c; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-coin-dollar" style="font-size: 1.5em;"></span>
			<h5>Ventas del día</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarVentasDiaController(); 

			?></b>
			</h2>
		</center>
	</div>
	<div style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #feeb04; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-dropbox" style="font-size: 1.5em;"></span>
			<h5>Productos</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarProductosController(); 

			?></b>
			</h2>
		</center>
	</div>
	<div style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #fe3636; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-price-tag" style="font-size: 1.5em;"></span>
			<h5>Marcas</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarMarcasController(); 

			?></b>
			</h2>
		</center>
	</div>
	<div style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #fe8236; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-truck" style="font-size: 1.5em;"></span>
			<h5>Proveedores</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarProveedoresController(); 

			?></b>
			</h2>
		</center>
	</div>
	<div style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 5px; background-color: #c136fe; margin-left: 5px; margin-right: 5px; width: 162px;">
		<center>
			<span class="icon-folder-open" style="font-size: 1.5em;"></span>
			<h5>Categorías</h5>
			<h2><b>
			<?php

				$calcular = new Controller();
				$calcular -> contarCategoriasController(); 

			?></b>
			</h2>
		</center>
	</div>
	<br><br><br>
	<div id="linechart_material" style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302),0 2px 6px 2px rgba(60,64,67,0.149); padding: 18px; border-radius: 17px; margin-top: 10px; margin-left: 5px; margin-right: 5px; width: 100%;"></div>
</div><br>
<script type="text/javascript" src="vistas/js/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Mes');
      data.addColumn('number', 'Usuarios Registrados');
      data.addColumn('number', 'Usuarios Inactivos');
      data.addColumn('number', 'Usuarios Activos');

      const mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

      data.addRows([
        [1,  37.8, 80.8, 41.8],
        [2,  30.9, 69.5, 32.4],
        [3,  25.4,   57, 25.7],
        [4,  11.7, 18.8, 10.5],
        [5,  11.9, 17.6, 10.4],
        [6,   8.8, 13.6,  7.7],
        [7,   7.6, 12.3,  9.6],
        [8,  12.3, 29.2, 10.6],
        [9,  16.9, 42.9, 14.8],
        [10, 12.8, 30.9, 11.6],
        [11,  5.3,  7.9,  4.7],
        [12,  6.6,  8.4,  5.2]
      ]);

      var options = {
        chart: {
          title: 'Usuarios Registrados en la Base de Datos',
          subtitle: 'usuarios (activos/inactivos)'
        },
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script>
