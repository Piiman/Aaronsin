<?php
  include("valida.php");
  include("enviar_datos_personaje.php");
?>

<!DOCTYPE html>
<html lang="en" class="animated fadeInRight">
<head>
  <title>Crea a tu personaje</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8/">
  <link rel="stylesheet" type="text/css" href="estilo_formulario_personaje.css">
  <link rel="stylesheet" type="text/css" href="estilo_header.css">
  <link rel="stylesheet"  href="animate.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="header.js"></script>
 

</head>

<body>
  <header>
        
         <div class="envol">
         <div class="logo"> Gestor de Personajes </div>         
          <nav>
          <!--a href="login.html">Inicia Sesión</a>
          <a href="registro_usuario.html">Regístrate</a-->
          <a href="formulario_personaje.html">Crea / Edita</a>
          <a href="Reporte.html">Reporta</a> 
          </nav>
        </div>
        </header>
  <section class="contenido envol">
  <?php
    echo $nom
  ?>
  <a href="cerrar.php">Cerrar Sesion</a>

<h1>Crea tu personaje</h1>
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

  Nombre*:<br>
  <input type="text" class="redoncol" name="nombre" placeholder="Nombre"/>
  <br>
  Descripcion:<br>
  <textarea class="redoncol" rows="4" cols="40" name="desc"></textarea>
  <br>
  Sube una imagen de tu personaje!
  <br><br><input name="img" type="file"/>
  <br><br>
  <input type="submit" value="Guardar"/>
  <?php if(!empty($errores)): ?>
        <div>
          <ul>
            <?php echo $errores; ?>
          </ul>
        </div>
    <?php endif; ?>
</form>
</section>
</body>
</html>