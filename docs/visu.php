<?php 
include("Valida.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<h1>Hola</h1>
    <?php if(!empty($_SESSION['idper'])): ?>
        <div>
          <ul>
            <?php echo $_SESSION['idper']; ?>
          </ul>
        </div>
    <?php endif; ?>
 </body>
 </html>