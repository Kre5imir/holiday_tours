<html>
<head>
<title>
booking succesful
</title>
<body><?php include 'nav.php';?>
<h1>
booking succesful someone will get in touch with you shortly</h1>
<?php
	require_once 'config.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
	
	function clean($str, $connection) {
		return $connection->real_escape_string($str);
	}
	
	//Sanitize the POST values
	$firstname = clean($_POST['firstname'],$conn);
	$lastname = clean($_POST['lastname'],$conn);
	$phone = clean($_POST['phone'],$conn);
	$email = clean($_POST['email'],$conn);
	$bundlename = clean($_POST['bundlename'],$conn);
	
	
	
	$query = "insert into booking (firstname, lastname, phonenumber, email, bundlename) values('$firstname','$lastname','$phone','$email','$bundlename')"; 
		
	$result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
		
	
    $conn->close();
		
?>

</body>
</html>
