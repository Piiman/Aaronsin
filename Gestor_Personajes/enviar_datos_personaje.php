 <?php
	include("valida.php");


	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];

	if(empty($nombre) && empty($desc)){
		echo "Porfavor Llena todos los campos" ;
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
			$sql = "INSERT INTO personajes (id_per, autor, nombre, descripcion, foto) VALUES (null, ".$nom.", ".$nombre.", ".$desc.", null)";
			$conexion->exec($sql);
			echo "Personaje creado con exito";
			echo " valores Personaje Nombre: " . $nombre . " Desc: " . $desc ; 
		} catch (PDOExeption $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	$conexion = null;
	}
?> 