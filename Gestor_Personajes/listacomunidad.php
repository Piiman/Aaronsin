<?php

  $conexion = mysqli_connect('localhost', 'root', '','gsp');

  if (mysqli_connect_errno()) {
    echo "No es posible conectar con la DB";
    exit();
  }
  mysqli_select_db($conexion,'gsp') or die("No se encuentra la DB");
  //$statement = "SELECT * FROM (SELECT * FROM personajes ORDER BY id_per DESC LIMIT 10)Var1 ORDER BY id_per DES";
  $statement = "SELECT per.id_per as 'id_per', usu.nombre as 'autor', per.nombre as 'personaje', per.descripcion as 'desc' , per.foto as 'foto' from personajes as per inner join usuarios as usu on per.autor = usu.id order by 'id_per' DESC";
  $resultado = mysqli_query($conexion,$statement);

  $Bdetodo = mysqli_num_rows($resultado);
  $paginas = ceil($Bdetodo/10);

  //$linea = mysqli_fetch_array($resultado);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Comunidad</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
  background-color: #a7bae5;
}
tr:nth-child(even) {
  background-color: #c9d1e2;

</style>
</head>
<body>
<body style="background: #ffc94c;">
<h2 style="font-family:AR CENA;">Personajes Comunidad</h2>


<table style="width:100%">
<table id="t01">
  <tr>
    <th style="font-family:AR ESSENCE;">Nombre</th>
    <th style="font-family:AR ESSENCE;">Autor</th>
    <th style="font-family:AR ESSENCE;">Imagen</th>
  </tr>
  <?php foreach ($resultado as $fila) :?>
      <tr>
        <td style="font-family:Segoe Print;"><?php echo $fila['personaje']; ?></td>
        <td style="font-family:Segoe Print;"><?php echo $fila['autor']; ?></td>
        <?php
          if ($fila["foto"]!=null) {
           echo "<td><img src='data:image/jpeg; base64,". base64_encode($fila["foto"]). " '></td>";
            } else{
              echo "<td>Imagen no disponible</td>";
            }
         ?>
      </tr>
   <?php endforeach?>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <?php for ($i=1; $i <= $paginas; $i++): ?>
    <li class="page-item">
      <a class="page-link" href="#">
          <?php echo $i; ?>
      </a>
    </li>
    <?php endfor ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

</body>
</html>
