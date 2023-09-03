<?php
	function showError()
	{
		die("Sorry a problem occured: ". mysql_errno(). ":". mysql_error());
	}
?>