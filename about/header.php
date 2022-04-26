<?php require ('../db/session.php'); ?>
<?php require ('../db/config.php'); ?>
<!DOCTYPE html>

<html>
<head>
  <title>DAHO - Men</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>

  <style >
    body {
     font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font: 400 15px/1.8;
      color: #777;
      font-weight:600px;
      background-color:#fff;

  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #000;
  }
  .carousel-indicators{
    color: red;
  }
 .glyphicon-chevron-right{
  color: #000;
  font-size: 24px;
 }
  .glyphicon-chevron-left{
  color: #000;
  font-size: 24px;
 }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      width: 100%;
      margin: auto;
  }
  .carousel-caption h3 {
      color: #000 !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      color: #000;
  }
  .modal-header, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  .navbar {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      height: 70px;
      margin-bottom: 0;
      background-color: #fff;
      border: 0;
      font-size: 14px !important;
      letter-spacing: 3px;
      box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

      
  }
   #font{
    color: #000 !important;
  }
  .font a{
    color: #000 !important;
  }
  .font a:hover{
     color: grey !important;
  }
  .font li.active a{
    color: gray !important;
  }
  .navbar li a, .navbar .navbar-brand { 
    margin-top: 13px;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
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
  .txt-heading{
    background-color: #fff; 
    margin-top: 20px;
  }
  </style>
 </head>
  <?php
              $result= mysqli_query($conn,"select *  from members where mem_id='$id_session'") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['mem_id'];
              ?>
    
 <body>
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" id="font" href="../index2.php" >DAHO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
        <li>
          <style type="text/css">
            #keyword{border: #CCC 1px solid; border-radius: 4px; padding: 7px;background:url("demo-search-icon.png") no-repeat center right 7px;}
          </style>
     </li>
        <li class="font"><a href="../index2.php">HOME</a></li>
        <li class="font"><a href="../men/mens.php">SHOP</a></li>
        <li class="active"><a href="#about">ABOUT US</a></li>
        <li class="font"><a href="../contact-form">CONTACT US</a></li>

        <li class="dropdown">
		<i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
          <span class="caret" style="color: #ffffff;"></span></a>
          <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
		  <li class="font"><a href="">Hi <?php echo $row['username']?></a></li>
            <li><a href="uploadf.php">Uploadproduct</a></li>
            <li><a href="profile.php<?php echo '?mem_id='.$id; ?>">EditProfile</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
 
  <?php }?>
