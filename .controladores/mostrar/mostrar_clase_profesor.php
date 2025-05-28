<?php 

	session_start();

	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');

    if(isset($_SESSION['usuario'])){
		
    	$id_usuario = $_SESSION['usuario']['id_usuario'];
		
		$consulta = new consulta();
		$filas = $consulta->mostrar_clase_profesor($id_usuario);

		$json = array();
		if(empty($filas)){

	        $jsonstring = json_encode($json);
		    echo $jsonstring;

		}else{

		    foreach ($filas as $fila){
		    	$json[] = array(
		    		'id' => $fila['id_clase'],
		            'nombre' => $fila['nombre_clase'],
		            'descripcion' => $fila['desc_clase'],          
		        );
		    }

		    $jsonstring = json_encode($json);
		    echo $jsonstring;

		}
	}
 
?>