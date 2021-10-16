<?php
	include 'php/conexion.php';
	class Procesos{
		function __construct(){
			//Conectamos con la BD
			$objeto = new Conexion;
			$objeto->conectar();
			$this->resultado = $objeto->ejecutarConsulta("SELECT * FROM empleados");
		}
		function listar(){
			$contador=0;
			echo '<h1>Listado de empleados</h1>';
			while (!$this->resultado->EOF) {
				echo '<div>';
				for($i=0; $i<count($this->resultado->fields)/2;$i++){
					if($this->resultado->fields[$i] != '')
						echo '<input type="text" value="'.$this->resultado->fields[$i].'" />';
					else
						echo '<input type="text" />';
				}
				echo '<input type="button" name="b'.$contador.'" value="Borrar" />';
				echo '<input type="button" name="m'.$contador.'" value="Modificar" />';
				echo '</div>';
				$contador++;
				$this->resultado->MoveNext();
			}
		}
		function add(){
			echo '<h1>Nuevo empleado</h1>';
			echo '<div>';
			echo '<input type="text" placeholder="ID" />';
			echo '<input type="text" placeholder="DNI" />';
			echo '<input type="text" placeholder="Nombre" />';
			echo '<input type="text" placeholder="e-mail" />';
			echo '<input type="text" placeholder="Telefono" />';
			echo '<input type="submit" value="Enviar" />';
			echo '</div>';
		}
	}
?>