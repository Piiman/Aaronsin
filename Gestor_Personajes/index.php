<!DOCTYPE html>
<html lang="en" class="animated bounceIn">
<head>
  <title>Inicio</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/">
 <link rel="stylesheet" type="text/css" href="css/estilo_index.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_header.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/header.js"></script>
    <link rel="stylesheet"  href="css/animate.css">

    <style>
    .button {
      background-color: #6883c1;
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      -webkit-transition-duration: 0.4s;
      transition-duration: 0.4s;
      cursor: pointer;
    }
    .button1 {
      background-color: white;
      color: black;
      border: 2px solid #6883c1;
    }
    .button1:hover {
  background-color: #6883c1;
  color: white;
  }

    </style>
</head>

<body>

 <header>
   <div class="envol">
         <div class="logo" style="font-family:AR ESSENCE;"> Gestor de Personajes </div>
   				<nav>
   				<a href="login.php" style="font-family:Tempus Sans ITC;">Inicia Sesión</a>
   				<a href="registro_usuario.php"style="font-family:Tempus Sans ITC;">Regístrate</a>
   				<a href="formulario_personaje.php"style="font-family:Tempus Sans ITC;">Crea / Edita</a>
   				<a href="Reporte.php"style="font-family:Tempus Sans ITC;">Reporta</a>

   				</nav>
   			</div>
   			</header>

   			<section class="contenido envol">
<h1 style="font-family:Tempus Sans ITC;">¡Bienvenido al Gestor de Personajes!</h1>
<br>

<button type="button"class="button button1" ><a href="./login.php" style="font-family:Kristen ITC;"> Iniciar Sesión </button>
<br><br>
<button type="button" class="button button1"><a href="./registro_usuario.php" style="font-family:Kristen ITC;"> Registrate </button>

</section>
</body>
</html>
