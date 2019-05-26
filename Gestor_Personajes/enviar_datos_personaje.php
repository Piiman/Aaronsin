 <?php
 	//session_start();
 	$idusuario = $_SESSION['id'];
 	$nomper = "";
	$desc = "";
	$errores = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nomper = $_POST['nombre'];
	$desc = $_POST['desc'];
	if(empty($nomper)){
	$errores = '<li>Nombre Requerido</li>';
	}else{

	try {
	$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
	if(isset($_FILES['img'])){
    	$nombre_archivo =$_FILES['img']['name'];
	    $tipo_archivo = $_FILES['img']['type'];
    	$tamano_archivo = $_FILES['img']['size'];
    	if($tamano_archivo <=3000000 && $tamano_archivo>=1){
    		if(tipo_archivo=="image/jpeg"||tipo_archivo=="image/jpg"||tipo_archivo=="image/png"||tipo_archivo=="image/gif"){
				$rutaDes = $_SERVER['DOCUMENT_ROOT']. "/img/" ;
				move_uploaded_file($_FILES['img']['tmp_name'], $rutaDes . $nombre_archivo);	
	    		$objetivo = fopen($rutaDes . $nombre_archivo, "r");
	    		$contenido_foto = fread($objetivo, $tamano_archivo);
				fclose($objetivo);
    		//$statement = $conexion->prepare('SELECT * FROM personajes WHERE nombre = :nomper LIMIT 1');
    		//$statement->execute(array(':usuario' => $nomper));
			//$resultado = $statement->fetch();
			//if ($resultado != false) {
			//	$errores .= '<li>El nombre de usuario ya existe</li>';
			//	header('Location: formulario_personaje_con_error.php');
			//}else{
			//	$statement = $conexion->prepare('INSERT INTO usuarios (id_per, autor, nombre,descripcion,foto,tfoto) VALUES (null, :idusu, :nombre, :descrip, :foto, :tfoto)');
			//	$statement->execute(array(':idusu' => $idusuario, ':nombre' => $nomper, ':descrip'=>$desc, ':foto'=>$contenido_foto, ':tfoto'=>$tipo_archivo));

			//header('Location: visualizacion.php');
			}else{
				$errores .= '<li>No es una imagen</li>';
			//header('Location: formulario_personaje_con_error.php');
			}
		}else{
			$errores .= '<li>Tamaño de la foto no soportado</li>';
			//header('Location: formulario_personaje_con_error.php');
		}
	}else{
		//$statement = $conexion->prepare('SELECT * FROM personajes WHERE nombre = :nomper LIMIT 1');
    	//$statement->execute(array(':usuario' => $nomper));
		//$resultado = $statement->fetch();
		//if ($resultado != false) {
		//	$errores .= '<li>El nombre de usuario ya existe</li>';
		//	header('Location: formulario_personaje_con_error.php');
		//}else{
		//	$statement = $conexion->prepare('INSERT INTO usuarios (id_per, autor, nombre,descripcion,foto,tfoto) VALUES (null, :idusu, :nombre, :descrip, null, null)');
		//	$statement->execute(array(':idusu' => $idusuario, ':nombre' => $nomper, ':descrip'=>$desc));
		//	}
		//	header('Location: visualizacion.php');
	}
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}}
}

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