<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Editar perfil</title>

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
   $correoviejo = filter_input(INPUT_POST, 'correosesion');
    $namesession = $_SESSION['name'];
    
    echo"
    <div class='container'>
        <strong>Bienvenido: $namesession</strong>
        <h3>Cambia aqui tus datos</h3><br>
            <form method='post' action='update-profile.php'>
                <input type='hidden' name='correoviejo' value='$correoviejo'>
                
                <div class='form-group'>				
                <input type='text' class='form-control' name='name' placeholder='Edita tu nombre' required>
                </div>

                <div class='form-group'>				
                <input type='email' class='form-control' name='email' placeholder='Edita tu correo' required>
                </div>
                
                <div class='form-group'>				
                <input type='password' class='form-control' name='password' placeholder='Cambia tu contraseña' required>
                </div>
                
                <button type='submit' class='btn btn-success btn-block'>Actualizar datos</button>
            </form>
         
        <br><br>
        <form method='post' action='confirm-delete.php'>
        <input type='hidden' name='correodel' value='$correoviejo'>
        <button type='submit'>Eliminar cuenta</button>
        </form>
        
        <p><a href='logout.php'>Cerrar sesión</a></p>
        <p><a href='check-login.php'>Volver a inicio</a></p>
    </div>
    ";
    ?>
    
    
   
      
     
 </body>
</html>


