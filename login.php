<?php

	require('conexion.php');
	sleep(2);
    session_start();
	$usu=$_POST['usuariolg'];
	$pass=$_POST['passlg'];

	$usuarios = $mysqli->query("SELECT id_usuario, user_name, rela_tipo_usuario, nombre_persona, rela_usuario FROM usuario, persona WHERE rela_usuario = id_usuario AND user_name='".$usu."' AND password='".$pass."'");

	if ($usuarios->num_rows == 1):
		$datos = $usuarios->fetch_assoc();
		$_SESSION['usuario'] = $datos;
		echo json_encode(array('error'=>false,'tipo_usuario'=>$datos['rela_tipo_usuario']));
	else:
		echo json_encode(array('error'=>true));
	endif;

	$mysqli->close();

?>
