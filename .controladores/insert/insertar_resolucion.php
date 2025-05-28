<?php 
    session_start();
	require_once ('../../.clases/class.conexion.php');
	require_once ('../../.clases/class.consultas.php');
	
    if (isset($_POST['submit'])) {
    if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {


      // creamos las variables para subir a la db
        $ruta = "upload/";
        $nombrefinal= trim ($_FILES['archivo']['name']); //Eliminamos los espacios en blanco
        $upload= $ruta . $nombrefinal;
        $ruta01="../../.vistas/upload/";
        $upload01=$ruta01 . $nombrefinal;



        move_uploaded_file($_FILES['archivo']['tmp_name'], $upload01) //movemos el archivo a su ubicacion

                    
                 
      }
  }

	if(isset($_POST['asunto']) and isset($_SESSION['usuario']['id_usuario'])){
    $usuario=$_SESSION['usuario']['id_usuario'];
    $asunto = $_POST['asunto'];
	$tipo= $_FILES['archivo']['type'];
	$size= $_FILES['archivo']['size'];
    
	    

		$consulta = new Consulta();
		$mensaje = $consulta->insertar_resolucion($usuario, $asunto, $upload, $tipo, $size);
		
	}	
      
 ?>
 