 <?php
$servidor = "localhost";
$user = "user";
$pass = "1234";
$basedatos = "daebatos";

$conn = new mysqli($servidor, $user, $pass, $basedatos);

if ($conn->connect_error) {
    die("Coneccion fallida " . $conn->connect_error);
}

$sql = "INSERT INTO personajes(nombre,raza,genero,clase,fuerza,destreza,salud,resistencia,inteligencia,sabiduria,carisma,habilidades) 
VALUES($_GET["nombre"], $_GET["raza"], $_GET["genero"], $_GET["clase"], $_GET["fuerza"], $_GET["destreza"], $_GET["salud"], $_GET["resistencia"], $_GET["inteligencia"], $_GET["sabiduria"], $_GET["carisma"], $_GET["habilidades"]);

if ($conn->query($sql) === TRUE) {
    echo "nuevo personaje creado";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 