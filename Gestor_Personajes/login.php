<?php session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: formulario_personajes.php');
}
$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=gsp', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}
	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE nombre = :usuario AND contrasena = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario, 
		':password' => $password
	));
	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: formulario_personaje.php');
	} else {
		$errores .= '<li>Datos Incorrectos</li>';
	}
}
//require 'views/login.view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  	<link rel="stylesheet"  
  	href="estilo_login.css">
</head>
<body>
	<h1>Iniciar Sesión</h1>
	<div class="contenedor">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
		<input type="text" name="usuario" placeholder="Usuario"><br>
		<input type="password" name="pwd" placeholder="Contrasena"><br>
		<button type="button" onclick="login.submit()">Iniciar Sesion</button><br>
		<?php if(!empty($errores)): ?>
				<div>
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
		<?php endif; ?>
	</form>
	<p>
		<a href="registro_usuario.php">Registrate</a><br>
	</p>
</body>
</html>