<?php 

include('../db/config.php');
include('../db/session.php');

$get_id=$_GET['user_id'];

$history_record=mysqli_query($conn,"select * from members where mem_id=$id_session");
$row=mysqli_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];

mysqli_query($conn,"delete from members where mem_id = '$get_id' ")or die(mysqli_error());

header('location:../index.php');
?>