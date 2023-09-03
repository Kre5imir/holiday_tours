<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body><?php include 'nav.php';?>
<table class="table table-bordered">
	 <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
	  <th scope="col">Email</th>
	  <th scope="col">bundelname</th>
    </tr>
<?php
	require_once 'config.php';
	require_once 'error.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

	
	$query = "select * from booking";
	
	$result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);
	
	while($row = mysqli_fetch_array($result)){
		$bundlename = $row['bundlename'];
		//echo $bundlename;  
	
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$phone = $row['phonenumber'];
	$email = $row['email'];
	$bundlename = $row['bundlename'];?>
	
	
    <tr scope="row">
      <td><?php echo $firstname ?></td>
      <td><?php echo $lastname ?></td>
      <td><?php echo $phone	  ?></td>
	  <td><?php echo $email ?></td>
	  <td><?php echo $bundlename ?></td>
    </tr>
	
	
	<?php 
		 
  };
  
  $result->close();
  $conn->close();
	
?></table>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
 
<a href = "admin_homepage.php">Back to home page<a>
</body>
</html>