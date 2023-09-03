<body><?php include 'nav.php';?>
<table class="table table-bordered">
	 <tr>
	 <th scope="col">Bundlename</th>
      <th scope="col">City</th>
      <th scope="col">Hotel</th>
      <th scope="col">Persons</th>
	  <th scope="col">Days</th>
	  <th scope="col">Price</th>
    </tr>

<?php
	require_once 'config.php';
	require_once 'error.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

	
	$query = "select * from shop";
	
	$result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);
	
	while($row = mysqli_fetch_array($result)){
		$bundlename = $row['bundlename'];
		//echo $bundlename;  
		
	$city = $row['city'];
	$hotel = $row['hotel'];
	$persons = $row['persons'];
	$days = $row['days'];
	$price = $row['price'];?>
	
	
    <tr scope="row">
      <td><?php echo '  <a href="display_bundle.php?name=' .$bundlename.' ">'. $bundlename. '</a>'; ?></td>
      <td><?php echo $city ;?></td>
      <td><?php echo $hotel	;?></td>
	  <td><?php echo $persons ;?></td>
	  <td><?php echo $days ;?></td>
	  <td><?php echo $price ;?></td>
    </tr>
	
	
	<?php 	 
  };
  
  $result->close();
  $conn->close();
	
?>
</table>
<a href = "index.php">Back to home page<a>
</body>
</html>