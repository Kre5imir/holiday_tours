<html>
  <head>
     <title>Bundle</title>
   </head>
  <body>
  
<?php


	require_once 'config.php';
	include 'nav.php';
	require_once 'error.php';

	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

	$id = $_GET['name'];

	$result = mysqli_query($conn,"SELECT * FROM shop WHERE bundlename = '$id'");
	
	while($row = mysqli_fetch_array($result)){
			
			echo '
		<img src="data:image/jpg; base64,'.base64_encode($row['imageID']).'" alt="image"><br>
		Bundle name : 	'.$row['bundlename'].'<br>
		City :    		'.$row['city'].'<br>
		Hotel :   		'.$row['hotel'].'<br>
		Persons : 		'.$row['persons'].'<br>
		Days :    		'.$row['days'].'<br>
		Price :   		'.$row['price'].'<br>
				';
	}
		
  $result->close();
  $conn->close();
	
 ?>
 
  <form  class="navbar-form navbar-left" name="bookings" action="bookingMade.php" method="post">
  <div class="form-group">
  <table border="0">
		<tr>
			<td>
				firstname:
			</td>
			<td>
				<input type="text" class="form-control" name="firstname" value = "">
			</td>	
		</tr>
		<tr>
			<td>
				lastname:
			</td>
			<td>
				<input type="text" class="form-control" name="lastname" value = "">
			</td>
		</tr>
		<tr>
			<td>
				phone:
			</td>
			<td>
				<input type="text" class="form-control"name="phone" value = "">
			</td>
		</tr>
		<tr>
			<td>
				email:
			</td>
			<td>
				<input type="text" class="form-control" name="email" value = "">
			</td>
		</tr>
	</table>
	
    <input readonly type="text" class="form-control" name="bundlename" value="<?php echo $id; ?>">
	<input type="submit" value="book now">
  </div>
  
</form>

	  </body>
</html>

