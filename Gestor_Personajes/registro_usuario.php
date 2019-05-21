<?php session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: formulario_personajes.html');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['vpassword'];
	$errores = '';
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li>Por favor rellena todos los datos</li>';
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
		} catch (PDOExeption $e) {
			echo "Error: " . $e->getMessage();
		}
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE nombre = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();
		
		if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}
		//HASS DE LA CONTRASEñA (encriptar)
		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);
		if ($password != $password2) {
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, nombre, contrasena) VALUES (null, :usuario, :pass)');
		$statement->execute(array(':usuario' => $usuario, ':pass' => $password));
		header('Location: login.php');
	}
}
//require 'registro_usuario.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Registro</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
		<input type="text" name="usuario" placeholder="Usuario"><br>
		<input type="password" name="password" placeholder="Contrasena"><br>
		<input type="password" name="vpassword" placeholder="VContrasena"><br>
		<button type="button" onclick="login.submit()">Registrar</button><br>
		<?php if(!empty($errores)): ?>
				<div>
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
		<?php endif; ?>
	</form>
	<p>
		<a href="login.php">Iniciar Seción</a>
	</p>

</body>
</html>