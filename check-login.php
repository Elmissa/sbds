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
			
			$email = $_POST['email']; 
			$password = $_POST['password'];
                        $correosesion = $email;
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['Password'];
			
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;						
			
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido: </strong> $row[Name]			
				
                                 <p>   <form action='edit-profile.php' method='POST'>
                                        <input type='hidden' id='correosesion' name='correosesion' value='$correosesion'>
                                        <p><button type='submit'>Editar perfil</button></p>
                                    </form>
                                 </p> 
                                
                                <p><a href='logout.php'>Cerrar sesión</a></p></div>";	
                                
                                echo"
                                    <table border='1' bgcolor='white'>
                                    <tr>
                                    <td><strong>ID</strong></td>
                                    <td><strong>NOMBRE</strong></td>
                                    <td><strong>ESTRENO</strong></td>
                                    <td><strong>SINOPSIS</strong></td>
                                    <td><strong>IMAGEN</strong></td>	
                                    </tr>
                                 ";
                                $sql="SELECT * from peliculas";
                                $result=mysqli_query($conn,$sql);

                                while($mostrar=mysqli_fetch_array($result)){
                                    
                                   echo "<tr>
                                    <td>"; echo $mostrar['id']; echo"</td>";
                                    echo"<td>"; echo $mostrar['nombre']; echo"</td>";
                                    echo"<td>"; echo $mostrar['fecha_estreno']; echo"</td>";
                                    echo"<td>"; echo $mostrar['sinopsis']; echo" </td>";
                                    echo"<td> <img src= '"; echo $mostrar['foto'];echo"' width='100' heigth='100' alt='foto'/> </td>
                                    </tr>";
                                }
                                echo"</table>";
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>Correo o contraseña son incorrectos!!
				<p><a href='login.html'><strong>Por favor, intenta de nuevo</strong></a></p></div>";			
			}	
			?>
		</div>
		
	</body>
</html>