<?php require ('../db/config.php'); ?>
<?php require ('db/session.php'); ?>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daho- Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="../bootstrap/style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>

  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 ;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      color: #777;
      font-weight:600px;
      background-color:#fff;
  }
  h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .nav-tabs li a {
      color: #777;
  }
  .navbar {
      font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      height: 70px;
      margin-bottom: 0;
      background-color: #fff;
      border: 0;
      font-size: 14px !important;
      letter-spacing: 3px;
      box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

     
  }
  .navbar li a, .navbar .navbar-brand { 
    margin-top: 10px;
      color: #000 !important;
  }
  .navbar-nav li a:hover {
      color: grey!important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: #000 !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  .admin-h{
    letter-spacing: normal;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">DAHO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
        <li><a href="#myPage">ADMIN DASHBOARD</a></li>
        <?php
  $user_query=mysqli_query($conn,"select *  from admin where id='$id_session'")or die(mysqli_error());
  $row=mysqli_fetch_array($user_query); {
?>
<li><a role="menuitem" href="logout.php" class="glyphicon glyphicon-log-out" style="color: red;">LogOut</a></li>
<?php } ?>
<?php } ?>
      </ul>

    </div>
  </div>
</nav>
<br><br><br>
<div style="background: #fff;max-width: 100%;"><p style="margin-left: 100px;margin-top:35px;font-weight: bolder;">Admin ><a href="" style="text-decoration: none;color: #000"> Home</a></p></div>
<hr>
 <div class="container-fluid" style="max-width: 95%;">
  <div class="row">
    <div class="col-sm-2" style="background-color:#f8f8f8;">
      <p style="color: #428bca;font-weight: bolder;margin-left: 30px;">Welcome <?php echo $row ['username']; ?></p>
      <p><img src="profile/<?php echo $row ['profile'];?>" style="height: 200px;width: 200px;border-radius: 360px;"></p>
      <div>
        <form method="post" action="" style="border-style: double;border: solid #000;">
          <p style="color: #428bca;font-weight: bolder;text-align: center;">Details</p>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">User Name</label>
            <input id="usr" class="form-control" type="text" name="username" value="<?php echo $row ['username'];?>">

          </div>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">E-mail</label>
            <input class="form-control" id="usr" type="email" name="email" value="<?php echo $row ['email'];?>">
          </div>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">Password</label>
            <input class="form-control" id="pwd" type="password" name="password" value="<?php echo $row ['password'];?>">
          </div>
          <div class="form-group" ">
            <input type="submit" name="update" value="Update" class="btn btn-danger" style="width: 100%;border-radius: 360px;">
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-9" style="background-color:#fff;margin-left:10px;">
      <h4 class="admin-h">Manage Users & Products</h4>
      <div class="container" style="max-width: 100%;">
        <div class="row">
          <div class="col-sm-2">
           
            <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="user.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-user "></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM members");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Users</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>

            <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="girlsproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM women");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Women Products</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div>
          </div>
          <div class="col-sm-2">
            <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="mensproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM men");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Men Products</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="userproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM userproduct");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Users Products</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="uploadf.php">
            <i style="font-size: 30px;" class="fa-solid fa-plus"></i>
            <div><a href="uploadf.php"> Add To Women</a></div>
            <div><?php echo $num_rows; ?></div>

            <div></div>
        </a>
      </div>

          </div>
          <div class="col-sm-2">
            <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="kids.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart "></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM kids");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Kids</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="uploadm.php">
            <i style="font-size: 30px;" class="fa-solid fa-plus"></i>
            <div><a href="uploadm.php">  Add To Men</a></div>
            <div><?php echo $num_rows; ?></div>

            <div></div>
        </a>
      </div><br>
      <div style="background: #D0CFCF; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="uploada.php">
            <i style="font-size: 30px;" class="fa-solid fa-plus"></i>
            <div><a href="uploada.php">Add To Kids</a></div>
            <div><?php echo $num_rows; ?></div>

            <div></div>
        </a>
      </div>
          </div>
        </div>
      </div>
      
       
    </div>
  </div>
</div>
 
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>

 © 2022 All Rights Reserved DAHO
</p> 
</footer>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        window.location.hash = hash;
      });
    } 
  });
})
</script>

</body>
</html>
