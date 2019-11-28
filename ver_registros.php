<?php
session_start();
?>


<html lang="es">
  <head>
    <title>Ver peliculas agregadas| ADMINISTRADOR</title>

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
       <p><strong>Estas son las peliculas registradas al momento</strong><p/><br>
        <table border='1 bgcolor='white'>
		<tr>
                        <td><strong>ID</strong></td>
			<td><strong>NOMBRE</strong></td>
                        <td><strong>ESTRENO</strong></td>
			<td><strong>SINOPSIS</strong></td>
                        <td><strong>IMAGEN</strong></td>	
		</tr>

		<?php 
		$sql="SELECT * from peliculas";
		$result=mysqli_query($conn,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
                        <td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['fecha_estreno'] ?></td>
			<td><?php echo $mostrar['sinopsis'] ?></td>
                        <td> <img src= "<?php echo $mostrar['foto']?>" width='100' heigth='100' alt='foto'/> </td>
			
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
</html>