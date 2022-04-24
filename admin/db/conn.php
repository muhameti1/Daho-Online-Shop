<?php
	$conn = new mysqli('localhost', 'root', '', 'daho');
	
	if(!$conn){
		die("Error!: Cannot connect to the database!");
	}
?>