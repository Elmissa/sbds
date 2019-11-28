<?php
session_start();
?>

<html lang="es">
  <head>
    <title>Registro de pelicula | ADMINISTRADOR</title>
    
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
	include 'conn.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
        
        
        $nombre_movie  = filter_input(INPUT_POST, 'nombre_pelicula') ;
        $fecha_movie = filter_input(INPUT_POST, 'fecha_estreno_pelicula') ;
        $sinopsis_movie = filter_input(INPUT_POST, 'sinopsis_pelicula');
        
        
        $foto=$_FILES["foto"]["name"];
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino="imagenes_peliculas/".$foto;
        copy($ruta,$destino);
        
        $foto_movie = $destino;
        
        $query = "INSERT INTO peliculas (nombre,fecha_estreno,sinopsis,foto) VALUES ('$nombre_movie', '$fecha_movie', '$sinopsis_movie', '$foto_movie')";

	if (mysqli_query($conn, $query)) {
            
		echo "
                  <br>  <strong>Bienvenido administrador </strong><br>
                <center>
                
                <div class='alert alert-success mt-4' role='alert'><h3>La pelicula fue agregada con éxito!</h3>
                <img src='images/exito.png' class='img-responsive'><br>
		</div>
                <a class='btn btn-outline-primary' href='check-login_admin.php' role='button'>Volver a inicio</a>
                </center>
                ";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
                	
	mysqli_close($conn);
        ?>
</body>
</html>>
