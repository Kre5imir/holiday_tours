	
<?php
  require_once 'config.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn) echo "Succeeded";
  if ($conn->connect_error) die($conn->connect_error);
?>


