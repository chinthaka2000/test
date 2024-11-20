<!-- logout.php - logout the user -->
<?php
	session_abort();
	session_destroy();
	header("Location:index.php");
	exit;
?>