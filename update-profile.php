<?php
session_start();
?>
<html lang="es">
  <head>
    <title>Actualización datos</title>
    
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
<h1>Actualización de datos</h1>
<img src="images/movies.png" class="img-responsive">
<center/>
<div class="container">

	<?php
	include 'conn.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";
	$result = $conn-> query($checkEmail);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
	echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Este correo ya ha sido registrado. Intenta con otro correo</p>
					<p><a href='check-login.php'>Volver a la pagina de inicio.</a></p>
				</div>";
	} else {
              
        $emailviejo = filter_input(INPUT_POST, 'correoviejo');
        $namenuevo = filter_input(INPUT_POST, 'name');
        $emailnuevo = filter_input(INPUT_POST, 'email');
        $passnuevo = filter_input(INPUT_POST, 'password');
	$passHashNuevo = password_hash($passnuevo, PASSWORD_DEFAULT);

	$query = "UPDATE users SET Name='$namenuevo', Email ='$emailnuevo', Password ='$passHashNuevo' WHERE Email= '$emailviejo' ";
        

	if (mysqli_query($conn, $query)) {
     
		echo "<div class='alert alert-success mt-4' role='alert'><h3>Datos actualizados con exito!</h3>
		<a class='btn btn-outline-primary' href='login.html' role='button'>Vuelve a iniciar sesión</a></div>";
                session_destroy();
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
</div>
</body>
</html>