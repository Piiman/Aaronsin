<?php
  include("valida.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Crea a tu personaje</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8/">
  <link rel="stylesheet" type="text/css" href="estilo_formulario_personaje.css">
</head>

<body>
  <?php
    echo $nom
  ?>
  <a href="cerrar.php"> Cerrar Sesion</a>

<h1>Crea tu personaje</h1>
<form action="enviar_datos_personaje.php" method="get">

  <m>Genero:</m><br>
  <input type="radio" name="genero" value="masculino" checked> Masculino<br>
  <input type="radio" name="genero" value="femenino"> Femenino<br>
  <input type="radio" name="genero" value="otro"> Otro
  <br><br>
  Nombre:<br>
  <input type="text" name="nombre" placeholder="Nombre">
  <br>
  Raza:<br>
  <input type="text" name="raza" placeholder="Raza">
  <br>
  Clase:<br>
  <input type="text" name="clase" placeholder="Clase">
  <br>
  Fuerza:<br>
  <input type="number" name="fuerza">
  <br>
  Destreza:<br>
  <input type="number" name="destreza">
  <br>
  Salud:<br>
  <input type="number" name="salud">
  <br>
  Resistencia:<br>
  <input type="number" name="resistencia">
  <br>
  Inteligencia:<br>
  <input type="number" name="inteligencia">
  <br>
  Sabiduria:<br>
  <input type="number" name="sabiduria">
  <br>
  Carisma:<br>
  <input type="number" name="carisma">
  <br>
  Habilidades:<br>
  <input type="text" name="habilidades" placeholder="Habilidades">
  <br>
  Sube una imagen de tu personaje!<br>
  <br><br>
  <form  name="subida-imagen" type="POST" enctype="multipart/formdata">
    <input type="file" name="imagen"/>
     <input type="submit" name="subir-imagen" value="Enviar Imagen"/>
  </form>  
  <br><br>
  <input type="submit" value="Guardar">
</p>
</form>


</body>
</html>
<?php
include("valida.php");




/*
// Tratado de ficheros subidos con php
echo $_FILES['imagen1']['name'];
echo $_FILES['imagen1']['tmp_name'];
echo $_FILES['imagen1']['type'];
echo $_FILES['imagen1']['size'];
echo $_FILES['imagen1']['error'];

//Filtrado de los tipos de ficheros subidos con html

$extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
$max_tamanyo = 1024 * 1024 * 8;
if ( in_array($_FILES['imagen1']['type'], $extensiones) ) {
     echo 'Es una imagen';
     if ( $_FILES['imagen1']['size']< $max_tamanyo ) {
          echo 'Pesa menos de 1 MB';
     }
}

// Escritura de imágenes en la carpeta servidor
$ruta_indexphp = dirname(realpath(__FILE__));
$ruta_fichero_origen = $_FILES['imagen1']['tmp_name'];
$ruta_nuevo_destino = $ruta_indexphp . '/imagenes/' . $_FILES['imagen1']['name'];
if ( in_array($_FILES['imagen1']['type'], $extensiones) ) {
     echo 'Es una imagen';
     if ( $_FILES['imagen1']['size']< $max_tamanyo ) {
          echo 'Pesa menos de 1 MB';
          if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
               echo 'Fichero guardado con éxito';
          }
     }
} */
?>