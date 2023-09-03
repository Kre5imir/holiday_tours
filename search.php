<body>
<h1>
List of products
</h1>
<table border="1">

<?php
	require_once 'config.php';
	//require_once 'error.php';

	$conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

	$query = "select * from shop";
	//get from search form in city column from shop table 
	if ($_GET['data'])
	{
		$query = $query . " where city OR bundlename like '%$_GET[data]%'";
	}
	
	$result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);
	// Step 3
	$rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//display result 
    echo <<<_END
  <pre>
		
		City $row[0]
		Days $row[1]
		Persons $row[2]
		Hotel $row[3]
		Price $row[4]
  </pre>
_END;
  }
  
  $result->close();
  $conn->close();
	
?>
</table>
<a href = "index.php">Back to home page<a>
</body>
</html>