<?php 
	
	function MOSTRAR_TPDESARROLLADO(){
		$consulta = new Consulta();


		$filas = $consulta->mostrar_tpDesarrollado();

		
		echo '<table class="table table-bordered data-table">
				<thead>
					<tr>

						<th class="text-center">Usuario</th>
						<th class="text-center">Asunto</th>
						<th class="text-center">Ruta</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Peso</th>
						

						
					</tr>
				</thead>';

			echo '<tbody>';
							
			foreach ($filas as $fila){
				


					echo '<tr class="gradeA">';

						echo '<td>'.$fila['user_name'].'</td>';
						echo '<td>'.$fila['desc_actividad_desarrollada'].'</td>';
						echo '<td><i><a href="'.$fila['ruta'].'">'.$fila['ruta'].'</a></i></td>';
						echo '<td>'.$fila['tipo'].'</td>';
						echo '<td>'.$fila['size'].'</td>';
						
						
					

					echo '</tr>';
				

			}

			echo "</tbody>";

		echo '</table>';
     
      }

	

 ?>