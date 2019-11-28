<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Confirmar eliminación de cuenta</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="css/style-bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
                
  </head>
  <body>
    <?php
      if (isset($_SESSION['loggedin'])) {  
      }
      else {
          echo "<div class='alert alert-danger mt-4' role='alert'>
          <h4>Necesitas iniciar sesión para ver esta página.</h4>
          <p><a href='login.html'>Iniciar sesión ahora</a></p></div>";
          exit;
      }
     ?> 
      
     <?php 
     $namesession = $_SESSION['name'];
     $correodel = filter_input(INPUT_POST,'correodel');
     
     echo"
         
    <div class='container'>
        
    <strong>Bienvenido: $namesession</strong>
     
    <center>
     
        <h3>¿Estas seguro que quieres borrar tu cuenta?</h3><br>
        
            <img src='images/triste.png' class='img-responsive'>
            
            <br><br>
            
            <form method='post' action='delete-profile.php'>
            <input type='hidden' name='idcorreo' value='$correodel'>
            <button type='submit'>Eliminar cuenta</button>   
            </form>
            
            <br>
            
            <form method='post' action='check-login.php'>
            <button type='submit'>Cancelar</button>   
            </form>
     </center>
     </div>
    "; 
    ?>         
  </body>
  
