<?php 

  $conexion = mysqli_connect('localhost', 'root', '','gsp');

  if (mysqli_connect_errno()) {
    echo "No es posible conectar con la DB";
    exit();
  }
  mysqli_select_db($conexion,'gsp') or die("No se encuentra la DB");
  //$statement = "SELECT * FROM (SELECT * FROM personajes ORDER BY id_per DESC LIMIT 10)Var1 ORDER BY id_per DES";
  $statement = "SELECT * FROM personajes ORDER BY id_per DESC LIMIT 10";
  $resultado = mysqli_query($conexion,$statement);
  //$linea = mysqli_fetch_array($resultado);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Comunidad</title>
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
tr:nth-child(even) {
  background-color: #EBEB9A;

</style>
</head>
<body>

<h2>Personajes Comunidad</h2>


<table style="width:100%">
<table id="t01">
  <tr>
    <th>Nombre</th>
    <th>Autor</th> 
    <th>Imagen</th>
  </tr>
  <?php 
    while ($linea = mysqli_fetch_array($resultado)) {
    echo "<form>";
    echo "<tr>";
    echo "<td>".$linea["nombre"]."</td>";
    echo "<td>".$linea["autor"]."</td>";
    echo "<td><img src='data:image/jpeg; base64,". base64_encode($linea["foto"]). "'></td>";
    echo "</tr>";
    echo "</form>";
    }
   ?>
</table>

</body>
</html>
