<?php 

	class conexion{

		public function retornar_conexion(){
			try {

				$user = "root";
				$pass = "";
				$host = "localhost";//Solo si es el localhost
				$db = "db_primmat";
				$conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
				return $conexion;

			} catch (Exception $e) {

				return $e->getMessage(); 

			}		
		}
	}

 ?>