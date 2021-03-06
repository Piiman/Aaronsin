<?php 

include("valida.php");

$conexion = mysqli_connect('localhost', 'root', '','gsp');

  if (mysqli_connect_errno()) {
    echo "No es posible conectar con la DB";
    exit();
  }
  mysqli_select_db($conexion,'gsp') or die("No se encuentra la DB");
  //$statement = "SELECT * FROM (SELECT * FROM personajes ORDER BY id_per DESC LIMIT 10)Var1 ORDER BY id_per DES";
  $statement = "SELECT per.id_per as 'id_per', usu.nombre as 'autor', per.nombre as 'personaje', per.foto as 'foto' from personajes as per inner join usuarios as usu on per.autor = usu.id where per.autor = ". $_SESSION['id']. " order by per.id_per DESC";
  $resultado = $conexion->query($statement);

  $Bdetodo = mysqli_num_rows($resultado);
  $paginas = ceil($Bdetodo/7);

  $inicio = ($_GET['pagina']-1)*7;
  $statement_shido = "SELECT per.id_per as 'id_per', usu.nombre as 'autor', per.nombre as 'personaje', per.foto as 'foto' from personajes as per inner join usuarios as usu on per.autor = usu.id where per.autor =". $_SESSION['id']." order by per.id_per DESC LIMIT ".$inicio.",7";
  $resultado_shido = $conexion->query($statement_shido);

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Tus personajes</title>
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
  background-color: #bbd1ea;
}
tr:nth-child(even) {
  background-color: #99B9DE;
</style>
</head>
<body>

  <?php 
  if (!$_GET) {
    header('Location:listausuario.php?pagina=1');

  }
 ?>

<h2>Tus personajes</h2>

<a href="formulario_personaje.php">Crear personaje</a>
<a href="cerrar.php">Cerrar sesion</a>
<a href="listacomunidad.php">Los más recientes</a>

<table style="width:100%">
<table id="t01">
  <tr>
    <th>Nombre</th>
    <th>Autor</th> 
    <th>Imagen</th>
  </tr>
  <?php foreach ($resultado_shido as $fila): ?>
      <tr>
        <td><?php echo $fila['personaje']; ?></td>
        <td><?php echo $fila['autor']; ?></td>
        <?php 
          if ($fila["foto"]!=null) {
           echo "<td><img src='data:image/jpeg; base64,". base64_encode($fila["foto"]). " '></td>";
            } else{
              echo "<td>Imagen no disponible</td>";
            }
         ?>
         <?php echo '<td>
           <form action="visualizacion.php" method="POST">
             <input type="hidden" name="idper" value="'.$fila['id_per'].'">
              <button type="button" onclick="submit()">Wachar</button>
           </form>
         </td>'; ?>
      </tr>
   <?php endforeach?>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>"><a class="page-link" href="listausuario.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
    <?php for ($i=1; $i <= $paginas; $i++): ?>
    <li class="page-item <?php echo $_GET['pagina']==$i ? 'active':'' ?>">
      <a class="page-link" href="listausuario.php?pagina=<?php echo $i ?>">
          <?php echo $i; ?> 
      </a>
    </li>  
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled':'' ?>"><a class="page-link" href="listausuario.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>

</body>
</html>
