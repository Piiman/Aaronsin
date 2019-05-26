 <?php
	include("valida.php");

	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];
    $nombre_archivo =$_FILES['img']['name'];
    $tipo_archivo = $_FILES['img']['type'];
    $tamano_archivo = $_FILES['img']['size'];


	$rutaDes = $_SERVER['DOCUMENT_ROOT']. "/img/" ;

	move_uploaded_file($_FILES['img']['tmp_name'], $rutaDes . $nombre_archivo);

	echo $nom;
	echo $nombre;
	echo $desc;
	echo $nombre_archivo;
	echo $tipo_archivo;
	echo $tamano_archivo;
	echo $rutaDes;

	/*if(empty($nombre) && empty($desc)){
		echo "Porfavor Llena todos los campos" ;
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
			$sql = "INSERT INTO personajes (id_per, autor, nombre, descripcion, foto) VALUES (null," . $nom . "," .$nombre. "," .$desc.", null)";
			$conexion->exec($sql);
			echo "Personaje creado con exito";
			echo " valores Personaje Nombre: " . $nombre . " Desc: " . $desc ; 
		} catch (PDOExeption $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	$conexion = null;
	}*/
?> 