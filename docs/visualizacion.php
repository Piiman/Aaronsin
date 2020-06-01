<?php
  include("valida.php");

  //echo $_POST['idper'];
  if(empty($_POST['idper'])){
    $idper = $_SESSION['idper'];
  }else{
    $idper = $_POST['idper'];
  }
  echo $idper;
  //echo $_POST['aut'];
  if(empty($_POST['aut'])){
    $iduser = $_SESSION['id'];
  }else{
    $iduser = $_POST['aut'];
  }
  echo $iduser;


  $conexion = mysqli_connect('localhost', 'root', '','gsp');

  if (mysqli_connect_errno()) {
    echo "No es posible conectar con la DB";
    exit();
  }

  mysqli_select_db($conexion,'gsp') or die("No se encuentra la DB");
  $statement = "SELECT  * FROM personajes as per WHERE id_per = ".$idper." && autor = ".$iduser;
  $resultado = mysqli_query($conexion,$statement);
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
<!--h2>Nombre del personaje</h2-->


<a href="formulario_personaje.php">Crear personaje</a>
<a href="listausuario.php">Tus personajes</a>
<a href="listacomunidad.php">Los más recientes</a>

<table style="width:100%">
<table id="t01">
  <tr>
    <th>Nombre: <?php echo $nombre; ?></th>
  </tr>
<tr>
    <td>Imagen<br>
    <?php
    if ($foto !=null) {
      echo "<img src='data:image/jpeg; base64,". base64_encode($foto). "'>";
    }else{
      echo "Imagen no disponible";
    }
       ?>
    </td>
<tr>
    <td>Descripci&oacuten: <?php echo $descrip; ?></td>
    <?php echo "Autor:". $nomautor; ?>
</body>
</html>
