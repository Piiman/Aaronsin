<?php
  include("valida.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Crea a tu personaje</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8/">
  <link rel="stylesheet" type="text/css" href="estilo_formulario_personaje.css">
     <style>
   input {
     width: 250px;
     padding: 5px;
 }
     .redoncol{
     border-radius: 5px;
     border:1px solid #39c;
   }

     </style>
</head>

<body>
  <?php
    echo $nom
  ?>
  <a href="cerrar.php">Cerrar Sesion</a>

<h1>Crea tu personaje</h1>
<form enctype="multipart/form-data" action="enviar_datos_personaje.php" method="POST">

  Nombre:<br>
  <input type="text" class="redoncol" name="nombre" placeholder="Nombre"/>
  <br>
  Descripcion:<br>
  <textarea class="redoncol" rows="4" cols="40" name="desc"></textarea>
  <br>
  Sube una imagen de tu personaje!
  <br><br><input name="img" type="file"/>
  <br><br>
  <input type="submit" value="Guardar"/>
</form>
</body>
</html>