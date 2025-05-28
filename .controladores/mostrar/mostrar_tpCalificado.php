<?php 
	
	function MOSTRAR_TPCALIFICADO(){
		$consulta = new Consulta();


		$filas = $consulta->mostrar_tpCalificado();

		
		echo '<table class="table table-bordered data-table">
				<thead>
					<tr>

						<th class="text-center">Alumno</th>
						<th class="text-center">Observacion</th>
						<th class="text-center">Calificacion</th>
						<th class="text-center">Descripcion de la Actividad</th>
						<th class="text-center">Archivo</th>
						

						
					</tr>
				</thead>';

			echo '<tbody>';
							
			foreach ($filas as $fila){
				


					echo '<tr class="gradeA">';

						echo '<td>'.$fila['user_name'].'</td>';
						echo '<td>'.$fila['observacion'].'</td>';
						echo '<td>'.$fila['calificacion'].'</td>';
						echo '<td>'.$fila['desc_actividad_desarrollada'].'</td>';
						echo '<td><i><a href="'.$fila['ruta'].'">'.$fila['ruta'].'</a></i></td>';
						
						
					

					echo '</tr>';
				

			}

			echo "</tbody>";

		echo '</table>';
     
      }

	

 ?>