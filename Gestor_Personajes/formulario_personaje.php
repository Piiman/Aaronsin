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
  <a href="cerrar.php"> Cerrar Sesion</a>

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
<?php
//include("valida.php");




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