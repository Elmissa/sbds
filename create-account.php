<html lang="es">
  <head>
    <title>Registro</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="css/style-bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">

  </head>
<body>
<center>
<h1>¡¡Bienvenido a MoviesBuster!!</h1>
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
					<p>Este correo ya ha sido registrado.</p>
					<p><a href='index.html'>Volver a la pagina de inicio.</a></p>
				</div>";
	} else {	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$passHash = password_hash($pass, PASSWORD_DEFAULT);

	$query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$passHash')";

	if (mysqli_query($conn, $query)) {
            
		echo "<div class='alert alert-success mt-4' role='alert'><h3>Cuenta creada con éxito!</h3>
		<a class='btn btn-outline-primary' href='login.html' role='button'>Iniciar sesión</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
</div>
</body>
</html>