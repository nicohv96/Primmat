<?php 

	session_start();

	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');

    if(isset($_POST['codigo'])){

        $codigo_clase = $_POST['codigo'];
        $rela_usuario = $_SESSION['usuario']['id_usuario'];

        $consulta = new consulta();
		$respuesta = $consulta->comprobar_codigo($codigo_clase, $rela_usuario);

		if (!$respuesta) {

			if(strlen($codigo_clase) > 0){
				
				$consulta = new consulta();
				$consulta->insertar_clase_alumno($codigo_clase, $rela_usuario);

				echo 'Clase ingresada correctamente';

			}
			
		} else {

			die();

		}
		
    }

?>