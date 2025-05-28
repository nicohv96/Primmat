<?php 

	session_start();

	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');

    if(isset($_POST['nombre'])){

    	$codigo_clase = rand(1000,9999);
        $nombre_clase = $_POST['nombre'];
        $desc_clase = $_POST['descripcion'];
        $rela_usuario = $_SESSION['usuario']['id_usuario'];
		
		if(strlen($nombre_clase) > 0 && strlen($desc_clase) > 0){
			$consulta = new consulta();
			$consulta->insertar_clase($codigo_clase, $nombre_clase, $desc_clase, $rela_usuario);

			echo 'Clase ingresada correctamente';
		}

    }

?>