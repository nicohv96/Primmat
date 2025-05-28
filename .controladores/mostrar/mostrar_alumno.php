<?php
   
function Mostrar_alumno(){
		$consulta = new Consulta();
		$filas = $consulta->mostrar_alumno();
        echo '<div class="panel panel-default">';
		echo '<div class="panel-body">';
		echo '<table class="table tabla table-striped" id="dataTables-example">
				<thead>
					<tr>

						<th class="text-center">id</th>
						<th class="text-center">Apellido</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Grado</th>
						<th class="text-center">Tema</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Datos Estadisticos</th>
						<th class="text-center"></th>

				
					</tr>
				</thead>';

			echo '<tbody>';
							
			foreach ($filas as $fila){

					echo '<tr class="gradeA">';

						echo '<td>'.$fila['id_persona'].'</td>';
						echo '<td>'.$fila['apellido_persona'].'</td>';
						echo '<td>'.$fila['nombre_persona'].'</td>';
						echo '<td>'.$fila['desc_grado'].'</td>';

							$col = null;
							$modelo = new conexion();
							$conexion = $modelo->retornar_conexion();

							$sql = "SELECT tema.desc_tema, grado.id_grado, puntajes.rela_persona, puntajes.rela_grado, persona.id_persona FROM tema, grado, puntajes, persona WHERE tema.rela_grado = grado.id_grado and puntajes.rela_grado = grado.id_grado and puntajes.rela_persona = persona.id_persona and puntajes.rela_persona = '". $fila['id_persona'] ."'";

							$statement = $conexion->prepare($sql);
							$statement->execute();

							while($resultado = $statement->fetch()){
					        $col[] = $resultado;
							}
							
							echo '<td> <select>';

								foreach ($col as $c){

									echo '<option>'.$c['desc_tema'].'</option>';

								}

							echo '</select> </td>';


						echo '<td><input type="date"></input></td>';
						
						echo '<td><a class="btn btn-primary btn-block" role="button" href="grafico_estadistico/vertical.php">Grafico de barra</a></td>';

						echo '<td><a class="btn btn-danger btn-block" role="button" href="grafico_estadistico/tarta.php">Grafico de tarta</a></td>';

					echo '</tr>';
			}

			echo "</tbody>";

		echo '</table>';

	}
?>