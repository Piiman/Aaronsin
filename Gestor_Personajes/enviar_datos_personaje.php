 <?php
	include("valida.php");


	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];

	if(empty($nombre) && empty($desc)){
		echo "Porfavor Llena todos los campos" ;
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
		} catch (PDOExeption $e) {
			echo "Error: " . $e->getMessage();
		}
		$statement = $conexion->prepare('INSERT INTO personajes (autor,nombre,descripcion) VALUES ( :user, :nombre, :descripcion)');
		$statement->execute(array(':user' => $nom, ':nombre' => $nombre, ':descripcion' => $desc));
		echo "Personaje creado con exito";
		echo " valores Personaje Nombre: " . $nombre . " Desc: " . $desc ; 
	}
?> 