<?php
class Conexion{
	//metodo que se encarga de conectar con la BD
	public function conectar(){
		try{
			$link = new PDO("mysql:host=localhost; dbname=osomontes; charset=UTF8", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			return $link;
		}
		catch(PDOException $e){
			die("Error: ".$e->getMessage());
		}
		finally{
			$link = null;
		}
	}
}

?>