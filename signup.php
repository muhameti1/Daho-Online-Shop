<?php 


define('INCLUDE_CHECK',true);

require "db/conn.php";

if (isset($_POST['register'])) {

  $connection=new Database;

  $saved=$connection->InsertData($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['profile']);
  if ($saved) {
    header('location:signup.php?status=error&msg= You have successfully registered');
  }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>DAHO - Registration Form</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


  <script src="bootstrap/js/jquery.min.js"></script>
</head>
<style>
  body{
    background-color: #fff;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  background-image: url(https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80);
  background-repeat: no-repeat;
    background-size: 100%;
  width: 100%;
}
    

.row{
    display: flex;
    justify-content: center;
  }
  .col-sm-5{
    display: flex;
    align-items: flex-start;
  }
  .panel-heading{
    background-color: #f8f8f8 !important;
    color: #000 !important;
  }
  .panel-body{
    background-color: #fff;
  }
  .text{
    display: inline;
    text-align: left;
  }
  .btn-danger{
    background-color: #f8f8f8 !important;
    color: #000;
    border: none;
  }
  .btn-danger:hover{
    background-color: grey !important;
  }
 
</style>
<body>
<div class="container-fluid" >
  <div class="text-center">
  </div>
  <div class="row" style="max-height: 700px; width:100%" >
    <div class="col-sm-5" style="margin-top:50px; float:left;left:100px;">
      <div class="panel panel-default text-center">
        <div class="panel-heading" style="background: grey">
          <a href="../index.php"><h3 style="color:#000;">DAHO</h3></a>
          <h4>Registration Form</h4>
        </div>
        <div class="panel-body">
        <form method="post" action="" name="myForm" onsubmit="return validateForm()">
          <?php 

                        if (isset($_GET['status'])) {
                            $id=$_GET['status'];
                            $msg=$_GET['msg'];
                            ?>
                            <div id="$id" class="alert alert-danger">
                                <strong></strong><h4 style=";"> &nbsp; <?php echo $msg; ?>! <a href="index.php" style="color: ;">click here</a></h4>
                            </div>
                            <?php
                        }

                        ?>
      
        <div class="form-group">
           <label for="usr" class="text">First Name:</label>
           <input type="text" class="form-control" placeholder="first name" id="usr" name="firstname" required="" />

            </div>
             <div class="form-group">
           <label for="usr" class="text">Last Name:</label>
          <input type="text" class="form-control" placeholder="last name" id="usr" name="lastname" required="" />
            </div>
             <div class="form-group">
           <label for="usr" class="text">User Name:</label>
            <input type="text" class="form-control" id="usr"  placeholder="user name" name="username" required=""> 
            </div>
          <div class="form-group">
           <label for="E-mail" class="text">E-mail:</label>
             <input type="email" class="form-control" id="usr"  placeholder="e-mail" name="email" required="">
              </div>
          <div class="form-group">
             <label for="pass" class="text">Password:</label>
             <input  type="password" class="form-control" id="usr" minlength="6" placeholder="password" name="password" required="">
               </div>
               <div class="form-group" style="display: none;">
             <label for="pass" class="text">Profile picture:</label>
             <input  type="text" value="default.jpg" class="form-control" id="usr" name="profile" required="">
               </div>
               
               
       <label><input type="checkbox" value="" checked >By Clicking Register You Agree To All <a href="terms.text" style="text-decoration: underline;">Terms & Cookies</a></label><br><br>



               <div class="form-group">
                  <input type="submit" value="Register" class="btn btn-danger" id="usr" name="register" style="width: 100%; height: 50px; border-radius:360px; background: #000;border: none; ">
                </div>
                <label><p>Already have an account? <a href="index.php" style="color: grey; text-decoration: underline;">Login</a></p></label>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>