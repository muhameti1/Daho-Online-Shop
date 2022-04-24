<?php
$conn = mysqli_connect('localhost','root','','daho');

if(!$conn){
	echo "Connection Failed: ". mysqli_error($conn);
}
?>