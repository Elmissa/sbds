<?php
session_start();
?>

<html lang="es">
	<head>
		<title>MoviesBuster</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="stylesheet" href="css/style-bootstrap.css">
                <link rel="stylesheet" href="css/estilo.css">
                
	</head>
	<body>
		<div class="container">
		
			<?php
			include 'conn.php';	
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$user = $_POST['user']; 
			$password = $_POST['password'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT user,password FROM admin_access WHERE user = '$user' and password = '$password' ");
			
			
			if (!$result) {	
                            echo "<div class='alert alert-danger mt-4' role='alert'>Usuario o contraseña son incorrectos!!
                            <p><a href='login.html'><strong>Por favor, intenta de nuevo</strong></a></p></div>";
                            exit;
                        } 
                        
                        
                        if($user = mysqli_fetch_assoc($result)) {
                            $_SESSION['loggedin'] = true;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;						
			
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido administrador </strong> 			
				
                                
                                <p><a href='ver_usuarios.php'>Ver usuarios registrados</a></p>
                                <p><a href='ver_registros.php'>Ver registros de peliculas</a></p>
                                <p><a href='agregar_registros.php'>Agregar peliculas por estrenarse</a></p>
                                
                <br>                
				<p><a href='logout_admin.php'>Cerrar sesión</a></p></div>";
                        } 
                        else{
                            echo "<div class='alert alert-danger mt-4' role='alert'>Usuario o contraseña son incorrectos!!
                            <p><a href='login_admin.html'><strong>Por favor, intenta de nuevo</strong></a></p></div>";
                            exit;
                            }
			?>
		</div>
		
	</body>
</html>


