<?php 

    require_once ('../../.clases/class.conexion.php');
    require_once ('../../.clases/class.consultas.php');

    if(isset($_POST['id_clase'])){
        
        $id_clase = $_POST['id_clase'];

        $consulta = new consulta();
        $mensaje = $consulta->eliminar_clase_profesor($id_clase);

        echo $mensaje;

    }

?>