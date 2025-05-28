<?php 

	class consulta{

		//=========================Consultas para insertar datos=========================

		public function insertar_usuario($arg_user, $arg_pass, $arg_rela_tipo_usuario){

			$mensaje = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO usuario (user_name, password, rela_tipo_usuario) VALUES(:user, :pass, :rela_tipo_usuario)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':user', $arg_user);
			$statement->bindParam(':pass', $arg_pass);
			$statement->bindParam(':rela_tipo_usuario', $arg_rela_tipo_usuario);	
			
			if(!$statement){
				header('Location: ../../index.php?mensaje=1');
			}else{
				$statement->execute();
				header('Location: ../../index.php?mensaje=2');
				
			}
		}

		public function insertar_persona($arg_nombre_persona, $arg_apellido_persona, $arg_rela_usuario){
			
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO persona (nombre_persona, apellido_persona, rela_usuario) VALUES(:nombre, :apellido, :rela_usuario)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':nombre', $arg_nombre_persona);
			$statement->bindParam(':apellido', $arg_apellido_persona);
			$statement->bindParam(':rela_usuario', $arg_rela_usuario);		
			
			if(!$statement){
				return "Error al crear el registro";
			}else{
				$statement->execute();
			}
		}

		public function insertar_clase($arg_codigo_clase, $arg_nombre_clase, $arg_desc_clase, $arg_rela_usuario){
			
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO clase (codigo_clase, nombre_clase, desc_clase, rela_usuario) VALUES(:codigo, :nombre, :descripcion, :rela_usuario)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':codigo', $arg_codigo_clase);
			$statement->bindParam(':nombre', $arg_nombre_clase);
			$statement->bindParam(':descripcion', $arg_desc_clase);
			$statement->bindParam(':rela_usuario', $arg_rela_usuario);		
			
			if(!$statement){
				return "Error al crear el registro";
			}else{
				$statement->execute();
			}
		}

		public function insertar_clase_alumno($arg_codigo_clase, $arg_rela_usuario){
			
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO detalle_clase (rela_usuario, rela_clase) SELECT id_usuario, id_clase FROM usuario, clase WHERE id_usuario = :rela_usuario AND codigo_clase = :codigo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':codigo', $arg_codigo_clase);
			$statement->bindParam(':rela_usuario', $arg_rela_usuario);	
			
			if(!$statement){
				return "Error al crear el registro";
			}else{
				$statement->execute();
			}
		}

		
			

		

		//=========================Consultas para mostrar datos=========================

		public function mostrar_alumno(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT persona.id_persona, persona.apellido_persona, persona.nombre_persona, grado.desc_grado FROM persona, puntajes, grado WHERE puntajes.rela_persona=persona.id_persona and puntajes.rela_grado=grado.id_grado and puntajes.rela_grado=grado.id_grado";

			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}

		public function mostrar_clase_profesor($arg_usuario){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT id_clase, nombre_clase, desc_clase FROM clase WHERE rela_usuario = :usuario";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':usuario', $arg_usuario);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}

		public function mostrar_clase_alumno($arg_usuario){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT id_clase, nombre_clase, desc_clase, detalle_clase.rela_usuario, detalle_clase.rela_clase FROM clase, detalle_clase WHERE detalle_clase.rela_usuario = :usuario AND detalle_clase.rela_clase = id_clase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':usuario', $arg_usuario);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}

		public function mostrar_detalle_clase($arg_id_clase){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT codigo_clase FROM clase WHERE id_clase = :id_clase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':id_clase', $arg_id_clase);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}
//==============Aca comienzan las consultas de Enrique========================================
		public function insertar_resolucion($arg_rela_usuario, $arg_asunto, $arg_ruta, $arg_tipo, $arg_size ){
			
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO actividad_desarrollada (rela_usuario, desc_actividad_desarrollada,ruta,tipo,size)
    VALUES (:rela_usuario,:asunto,:ruta,:tipo,:size)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':rela_usuario', $arg_rela_usuario);
			$statement->bindParam(':asunto', $arg_asunto);
			$statement->bindParam(':ruta', $arg_ruta);
			$statement->bindParam(':tipo', $arg_tipo);
			$statement->bindParam(':size', $arg_size);
					
			
			if(!$statement){
				return "Error al crear el registro";
			}else{
				$statement->execute();
			}
		}
		public function insertar_calificacion($observacion, $arg_calificacion, $arg_rela_usuario, $arg_rela_actividad_desarrollada, $arg_ruta ){
			
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "INSERT INTO actividad_calificada(observacion, calificacion,rela_usuario,rela_actividad_desarrollada,ruta)
    VALUES (:observacion,:calificacion,:rela_usuario,:rela_actividad_desarrollada,:ruta)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':observacion', $observacion);
			$statement->bindParam(':calificacion', $arg_calificacion);
			$statement->bindParam(':rela_usuario', $arg_rela_usuario);
			$statement->bindParam(':rela_actividad_desarrollada', $arg_rela_actividad_desarrollada);
			$statement->bindParam(':ruta', $arg_ruta);
					
			
			if(!$statement){
				return "Error al crear el registro";
			}else{
				$statement->execute();
			}
		}
		public function mostrar_tpDesarrollado(){

			$filas = null;
			$modelo = new Conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT usuario.user_name, actividad_desarrollada.desc_actividad_desarrollada, actividad_desarrollada.ruta, actividad_desarrollada.tipo, actividad_desarrollada.size FROM actividad_desarrollada, usuario WHERE actividad_desarrollada.rela_usuario= usuario.id_usuario";

			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}	
		public function mostrar_tpCalificado(){

			$filas = null;
			$modelo = new Conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT usuario.user_name, actividad_calificada.observacion, actividad_calificada.calificacion, actividad_desarrollada.desc_actividad_desarrollada, actividad_calificada.ruta FROM actividad_calificada, usuario, actividad_desarrollada WHERE actividad_calificada.rela_usuario= usuario.id_usuario and actividad_calificada.rela_actividad_desarrollada= actividad_desarrollada.id_teoria_actividad_desarrollada";

			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}	

		public function select_actividad_desarrollada(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT * FROM actividad_desarrollada";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}
//==============Aca finaliza las consultas de Enrique==============================================

		/*
		public function mostrar_detalle_clase_alumno($arg_id_clase){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT codigo_clase, id_clase, clase.rela_usuario, id_usuario, nombre_persona, persona.rela_usuario FROM clase, usuario, persona WHERE id_clase = :id_clase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':id_clase', $arg_id_clase);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}
		*/

		//=========================Consultas para eliminar datos=========================

		public function eliminar_clase_profesor($arg_id_clase){

			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "DELETE FROM clase WHERE id_clase = :id_clase";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':id_clase', $arg_id_clase);
			
			if(!$statement){
				return "Error al eliminar la clase";
			}else{
				$statement->execute();
				return "Clase eliminada correctamente";
			}
		}

		//=========================Consultas para select dinamico=========================

		public function select_tema(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT tema.desc_tema, grado.id_grado, puntajes.rela_persona FROM tema, grado, puntajes WHERE tema.rela_grado = grado.id_grado and rela_persona = 1 ";

			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
	        $filas[] = $resultado;
			}
			return $filas;
		}	

		public function select_tipo_usuario(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT * FROM tipo_usuario";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}	
	
		
     
//=========================Consultas de comprobación=========================

		public function comprobar_codigo($codigo_clase, $rela_usuario){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();

			$sql = "SELECT detalle_clase.rela_usuario, detalle_clase.rela_clase, id_clase, codigo_clase FROM detalle_clase, clase WHERE detalle_clase.rela_usuario = :usuario AND detalle_clase.rela_clase = id_clase AND codigo_clase = :codigo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':usuario', $rela_usuario);
			$statement->bindParam(':codigo', $codigo_clase);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}

	}

 ?>