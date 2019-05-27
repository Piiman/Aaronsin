<?php session_start();
if (isset($_SESSION['usuario'])) {
	$nom = "<h1>". $_SESSION['usuario'] ."</h1>";
} else {
	header('Location: login.php');
}
?>