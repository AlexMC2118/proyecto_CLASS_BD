<?php
	include 'php/conexion.php';
	class Procesos{
		function __construct(){
			//Conectamos con la BD
			$this->objeto = new Conexion;
			$this->objeto->conectar();
		}
		function listar(){
			$resultado = $this->objeto->ejecutarConsulta("SELECT * FROM empleados");
			echo '<h1>Listado de empleados</h1>';
			while (!$resultado->EOF) {
				echo '<div>';
				echo '<form action="index.php" method="POST">';
				for($i=0; $i<count($resultado->fields)/2;$i++){
					if($resultado->fields[$i] != '')
						echo '<input type="text" name="'.$i.'" value="'.$resultado->fields[$i].'" />';
					else
						echo '<input type="text" name="'.$i.'" />';
				}
				echo '<input type="submit" name="borrar" value="Borrar" />';
				echo '<input type="submit" name="modificar" value="Modificar" />';
				echo '</form>';
				echo '</div>';
				$resultado->MoveNext();
			}
		}
		function addButtons(){
			echo '<h1>Nuevo empleado</h1>';
			echo '<div>';
			echo '<form action="index.php" method="POST">';
			echo '<input type="text" placeholder="ID" name="ID" required />';
			echo '<input type="text" placeholder="DNI" name="DNI" pattern="[0-9]{8}[a-zA-Z]{1}" required />';
			echo '<input type="text" placeholder="Nombre" name="Nombre" required />';
			echo '<input type="e-mail" placeholder="e-mail" name="e-mail" />';
			echo '<input type="text" placeholder="Telefono" name="Telefono" required />';
			echo '<input type="submit" value="Enviar" />';
			echo '</form>';
			echo '</div>';	
		}
		function add($id, $dni, $nombre, $email , $tlf){			
			$this->objeto->ejecutarConsulta('INSERT INTO empleados (idempleados, dni, nombre, correo, telefono) VALUES ('.$id.', "'.$dni.'", "'.$nombre.'", "'.$email.'", "'.$tlf.'")');
		}
		function borrar($id){
			$this->objeto->ejecutarConsulta('DELETE FROM empleados WHERE idempleados = '.$id);
		}
		function modificar($id, $dni, $nombre, $email , $tlf){
			$this->objeto->ejecutarConsulta('UPDATE empleados SET idempleados = '.$id.', dni= "'.$dni.'", nombre= "'.$nombre.'", correo= "'.$email.'", telefono= "'.$tlf.'" WHERE idempleados = '.$id);
		}
	}
?>