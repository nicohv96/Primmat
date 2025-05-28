<?php 

	function SELECT_ACTIVIDAD_DESARROLLADA(){

		$consulta = new consulta();
		$filas = $consulta->select_actividad_desarrollada();

		echo '<td> <select name="actividad_desarrollada">';

			foreach ($filas as $fila){

				echo '<option>'.$fila['desc_actividad_desarrollada'].'</option>';

			}

		echo '</select> </td>';

	}	

 ?>