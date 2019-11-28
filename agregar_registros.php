<?php
session_start();
?>
<html lang="es">
  <head>
    <title>Agregar registro | ADMINISTRADOR</title>
    
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
  echo"
    <div class='container'>
        <strong>Bienvenido administrador</strong>
        <h3>Ingresa los datos de la nueva pelicula</h3><br>
            <form method='post' action='agregar_pelicula.php' enctype='multipart/form-data'>
                
                
                <div class='form-group'>				
                <input type='text' class='form-control' name='nombre_pelicula' placeholder='Agregar nombre de pelicula' required>
                </div>

                <div class='form-group'>				
                <input type='date' class='form-control' name='fecha_estreno_pelicula' placeholder='¿Cuándo se estrena?' required>
                </div>
                
                <div class='form-group'>				
                <textarea name='sinopsis_pelicula' rows='7' cols='100' placeholder='Escribe una pequeña sinopsis de la película' required></textarea>
                </div>
                
                <div class='form-group'>
                Agregar una imagen:<br>
                <input type='file' name='foto' id='foto' accept='image/jpeg,image/jpg,image/gif,image/png'>
                </div>
                
                <button type='submit' class='btn btn-success btn-block'>Agregar pelicula</button>
            </form>
         
        <br>
        
        
        <p><a href='logout.php'>Cerrar sesión</a></p>
        <p><a href='check-login.php'>Volver a inicio</a></p>
    </div>
    ";
    ?>
  ?>    
      
  </body>