<?php
	$conn = new mysqli('localhost', 'root', '', 'daho');
	
	if(!$conn){
		die("Error: Can't connect to the database!");
	}
?>