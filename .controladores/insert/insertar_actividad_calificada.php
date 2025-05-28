<?php 

    session_start();
    require_once ('../../.clases/class.conexion.php');
    require_once ('../../.clases/class.consultas.php');
	
    if (isset($_POST['submit01'])) {
    if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {


      // creamos las variables para subir a la db
        $ruta = "upload_1/";
        $nombrefinal = trim ($_FILES['archivo']['name']); //Eliminamos los espacios en blanco
        $upload= $ruta . $nombrefinal;
        $ruta01="../../.vistas/upload_1/";
        $upload01=$ruta01 . $nombrefinal;



        move_uploaded_file($_FILES['archivo']['tmp_name'], $upload01);//movemos el archivo a su ubicacion

                    
                 
      }
  }

    $observacion = $_POST['observacion'];
    $calificacion= $_POST['calificacion'];
    $usuario=$_SESSION['usuario']['id_usuario'];
	$rela_actividad= $_POST['actividad_desarrollada'];
	
    
	    
    
		$consulta = new Consulta();
		$mensaje = $consulta->insertar_calificacion($observacion, $calificacion, $usuario, $rela_actividad, $upload);
   

		
		
      
 ?>
 