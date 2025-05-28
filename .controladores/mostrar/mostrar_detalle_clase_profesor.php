<?php 

	session_start();

	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');

    if(isset($_SESSION['usuario'])){
		
    	$id_clase = $_POST['id_clase'];
		
		$consulta = new consulta();
		$filas = $consulta->mostrar_detalle_clase($id_clase);

		$json = array();
		if(empty($filas)){

	        $jsonstring = json_encode($json);
		    echo $jsonstring;

		}else{

		    foreach ($filas as $fila){
		    	$json[] = array(
		    		'codigo_clase' => $fila['codigo_clase'],         
		        );
		    }

		    $jsonstring = json_encode($json);
		    echo $jsonstring;

		}
	}
 
?>