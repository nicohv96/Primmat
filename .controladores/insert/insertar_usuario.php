<?php 

	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');

	$mensaje = null;

	$user = $_POST['user_name'];
	$pass = $_POST['password'];
	$tipo_usuario = $_POST['rela_tipo_usuario'];

	$nombre = $_POST['nombre_persona'];
	$apellido = $_POST['apellido_persona'];

	$columnas = null;
	$modelo = new conexion();
	$conexion = $modelo->retornar_conexion();
	$sql_consulta = "SELECT user_name FROM usuario";
	$statement = $conexion->prepare($sql_consulta);
	$statement->execute();
	
	while($resultado1 = $statement->fetch()){
		$columnas[] = $resultado1;
	}
	
	foreach ($columnas as $columna){

		if ($user == $columna['user_name']){

			header('Location: ../../index.php?mensaje=1');
			exit;
			
		}
	}

	if(strlen($user) > 0 && strlen($pass) > 0 && strlen($tipo_usuario) > 0){

		$consulta = new consulta();
		$consulta->insertar_usuario($user, $pass, $tipo_usuario);

		$filas = null;
		$modelo = new conexion();
		$conexion = $modelo->retornar_conexion();
		$sql = "SELECT max(id_usuario) as id_usuario FROM usuario ";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($resultado = $statement->fetch()){
			$filas[] = $resultado;
		}
		
		foreach ($filas as $fila){
			$id_usuario = $fila['id_usuario'];
		}

		if(strlen($nombre) > 0 && strlen($apellido) > 0){

			$mensaje = $consulta->insertar_persona($nombre, $apellido, $id_usuario);
			echo $mensaje;

		}
	}

 ?>