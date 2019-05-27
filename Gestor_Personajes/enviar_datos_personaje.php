 <?php
	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];
	if(isset($_FILES['img'])){
    	$nombre_archivo =$_FILES['img']['name'];
	    $tipo_archivo = $_FILES['img']['type'];
    	$tamano_archivo = $_FILES['img']['size'];
    	if($tamano_archivo <=3000000 && $tamano_archivo>=1){
    		if(tipo_archivo=="image/jpeg"||tipo_archivo=="image/jpg"||tipo_archivo=="image/png"||tipo_archivo=="image/gif"){
			$rutaDes = $_SERVER['DOCUMENT_ROOT']. "/img/" ;
			move_uploaded_file($_FILES['img']['tmp_name'], $rutaDes . $nombre_archivo);	
			header('Location: visualizacion.php');	
    		}else{
			$_POST['error'] = 'Archivo no soportado';
			header('Location: formulario_personaje_con_error.php');
		}
		}else{
			$_POST['error'] = 'Archivo no soportado';
			header('Location: formulario_personaje_con_error.php');
		}
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