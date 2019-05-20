 <?php
$servidor = "localhost";
$user = "user";
$pass = "1234";
$basedatos = "dasebatos";

$conn = new mysqli($servidor, $user, $pass, $basedatos);

if ($conn->connect_error) {
    die("Coneccion fallida " . $conn->connect_error);
}

$sql = "SELECT $GET_["usuario"],$GET_["contrasena"] FROM usuarios";

if ($conn->query($sql) === TRUE) {
    echo "Inicio de sesion exitoso";
} else {
    echo "Usuario o contrase&ntildea incorrecta";
}

$conn->close();
?> 