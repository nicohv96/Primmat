<?php
require_once('../conexion.php');
?>
<!doctype html>
<html>
<head>
	<title>Grafico Estadistico</title>
	<script src="Chart.min.js"></script>
	<script src="utils.js"></script>

</head>
<body>
	<div id="container" style="width: 75%;">
		<canvas id="canvas"></canvas>
	</div>

	
	<script>
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Aciertos', 'Tiempo en minutos', 'Puntaje'],
			datasets: [{
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data:[
				<?php
				$sql="SELECT * from puntajes where rela_persona='1' and fecha_clase='10/03/2020' and rela_grado='4'";
				$result=mysqli_query($mysqli,$sql);
				while ($registros=mysqli_fetch_array($result)) {
					?>
					<?php echo $registros["aciertos"]?>,<?php echo $registros["tiempo"]?>,<?php echo $registros["numero_puntaje"]?>,'0','10'
					<?php
				}
				?>
				]

			}]

		};


		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,		
			});
		};

	</script>
	</body>
	</html>