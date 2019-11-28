<?php
session_start();
?>

<html lang="es">
  <head>
    <title>Cuenta eliminada</title>
    
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
    
<center>
<div class="container">

	<?php
	include 'conn.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	   
        $emailtodel = filter_input(INPUT_POST, 'idcorreo');
       
	$query = "DELETE FROM users WHERE Email= '$emailtodel' ";
        

	if (mysqli_query($conn, $query)) {
            
		echo "
                <center>
                    <div class='alert alert-success mt-4' role='alert'>
                    <h3>Se ha eliminado tu cuenta</h3>
                    <img src='images/adios.png' class='img-responsive'>
                    
                    <p><a class='btn btn-outline-primary' href='index.html' role='button'>Volver a página de inicio</a></div></p>
                </center>    
                ";
                session_destroy();
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		
	mysqli_close($conn);
	?>
</div>
    </center>
</body>
</html>