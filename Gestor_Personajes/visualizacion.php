<?php 
  include("valida.php");

  $nomper = 'panchito';
  $desc = 'es verga';


  $conexion = mysqli_connect('localhost', 'root', '','gsp');

  if (mysqli_connect_errno()) {
    echo "No es posible conectar con la DB";
    exit();
  }

  mysqli_select_db($conexion,'gsp') or die("No se encuentra la DB");
  $statement = "SELECT * FROM personajes WHERE nombre = 'panchito' && descripcion = 'es verga'";
  $resultado = mysqli_query($conexion,$statement);
  $autor = 'mayan';
  while ($fila=mysqli_fetch_array($resultado)) {
    $id_per=$fila["id_per"];
    $autor=$fila["autor"];
    $nombre=$fila["nombre"];
    $descrip=$fila["descripcion"];
    $foto=$fila["foto"];
  }
  $statement = "SELECT nombre FROM usuarios WHERE id= '".$autor."'";
  $resultado = mysqli_query($conexion,$statement);
  $fila = mysqli_fetch_array($resultado);
  $nomautor = $fila["nombre"];
 ?>

<!DOCTYPE>
<html>
<head>
<title> <?php echo $nombre; ?> </title>

<style>
table, th, td {
  border: 1px solid black;
adding: 5px;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}

</style>
</head>
<body>
<h2><Nombre del personaje></h2>

<table style="width:100%">
<table id="t01">
  <tr>
    <th>Nombre: <?php echo $nombre; ?></th>
  </tr>
<tr>
    <td>Imagen<br>
    <?php echo "<img src='data:image/jpeg; base64,". base64_encode($foto). "'>"; ?>
    </td>
<tr>
    <td>Descripci&oacuten: <?php echo $descrip; ?></td>
    <?php echo "Autor:". $nomautor; ?>
</body>
</html>