<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Ver usuarios | ADMINISTRADOR</title>

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
    ?>
   
   
  <div class='container'>
  <br><strong>Bienvenido administrador</strong> <br>
   <center>   
       <p><strong>Estos son los usuarios que se han registrado en la pagina</strong><p/><br>
      <table border="1" bgcolor='white'>
		<tr>
			<td><strong>ID</strong></td>
                        <td><strong>NOMBRE</strong></td>
			<td><strong>EMAIL</strong></td>
                        <td><strong>PASSWORD</strong></td>	
		</tr>

		<?php 
		$sql="SELECT * from users";
		$result=mysqli_query($conn,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['Id'] ?></td>
			<td><?php echo $mostrar['Name'] ?></td>
			<td><?php echo $mostrar['Email'] ?></td>
			<td><?php echo $mostrar['Password'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
   </center> 
  <p><a href='logout.php'>Cerrar sesión</a></p>
        <p><a href='check-login.php'>Volver a inicio</a></p>
  </div>
  
</body>