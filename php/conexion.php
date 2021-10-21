<?php
	include 'adodb5/adodb.inc.php';
	class Conexion {
		function __construct(){
			$this->DB = NewADOConnection('mysqli'); /*Iniciamos conexion con ADOdb*/
		}
		function conectar(){
			$server='11.2daw.esvirgua.com';
			$user='';
			$contrasenia='';
			$db='user2daw_BD1-11';
	
			$this->DB->Connect($server, $user, $contrasenia, $db);
		}
		function ejecutarConsulta($consulta){
			$resultado = $this->DB->Execute($consulta);
			// if (!$this->DB->Execute($consulta)) { /*Esta sentencia es para comprobar errores en la consulta*/
				// echo 'Error: '.$this->DB->ErrorMsg();
			// }	
			return $resultado;
		}
	}
?>
