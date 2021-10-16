<!DOCTYPE html>
<?php
	include 'php/procesos.php';
	$procesos = new Procesos;
?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Inicio</title>
		<link rel="stylesheet" href="css/estiloini.css"> 
	</head>
	<body>
		<main>
			<article>
				<?php
					if(isset($_POST['listar'])){
						$procesos->listar();
					}
					if(isset($_POST['add'])){
						$procesos->add();
					}
				?>
			</article>
			<article>
				<form action="index.php" method="POST">
					<?php
						if(!isset($_POST['listar']))
							echo '<input type="submit" name="listar" value="Listar empleados" />';
						if(!isset($_POST['add']))
							echo '<input type="submit" name="add" value="Añadir un nuevo empleado" />';
					?>
				</form>
			</article>
		</main>
	</body>
</html>
