<?php 

	function SELECT_TIPO_USUARIO(){

		$consulta = new consulta();
		$filas = $consulta->select_tipo_usuario();

		echo '<select name="rela_tipo_usuario" class="form-control input-lg">';

			foreach ($filas as $fila){

				echo '<option value="'.$fila['id_tipo_usuario'].'">'.$fila['desc_tipo_usuario'].'</option>';

			}

		echo '</select>';

	}	

 ?>