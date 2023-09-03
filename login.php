<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
	
	//Select database
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str, $connection) {
		return $connection->real_escape_string($str);
	}
	
	//Sanitize the POST values
	$email = clean($_POST['email'],$conn);
	$password = clean($_POST['password'],$conn);
	
	//Create query
	$qry="SELECT * FROM register WHERE Email='$email' AND Password='$password'";
	$result = $conn->query($qry);
    if (!$result) die ("Database access failed: " . $conn->error);
	
	//Check whether the query was successful or not
	
	if($result->num_rows == 1) {
			//Login Successful
		session_regenerate_id();
		$member = $result->fetch_array(MYSQLI_ASSOC);
		$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
		$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
		$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
		session_write_close();
			
			//echo $member['member_id'];
		header("location: admin_homepage.php");
		exit();
	}else {
		//Login failed
		header("location: access_denied.php");
		exit();
	}
	
?>