<?php 
    include 'conn.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
    }          
?>

<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>id</td>
			<td>nombre</td>
			<td>email</td>
			<td>telefono</td>	
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

</body>
</html>