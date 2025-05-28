<?php 

	function SELECT_TEMA(){

		$consulta = new consulta();
		$filas = $consulta->select_tema();

		echo '<td> <select>';

			foreach ($filas as $fila){

				echo '<option>'.$fila['desc_tema'].'</option>';

			}

		echo '</select> </td>';

	}	

 ?>