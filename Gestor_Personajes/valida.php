<?php session_start();
if (isset($_SESSION['usuario'])) {
	$nom = "<h1>". $_SESSION['usuario'] . $_SESSION['id'] ."</h1>";
	echo '<h1><a href="cerrar.php">Cerrar</a></h1>';
} else {
	header('Location: login.php');
}
?>