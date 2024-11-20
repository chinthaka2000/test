<?php
	require_once("connection.php");
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM clients WHERE id = $id";
		$conn->query($sql);
	}
	
	header("Location:inventory.php");
	exit;
	
?>