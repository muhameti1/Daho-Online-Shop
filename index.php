<html>
  <head>
    <title>DAHO</title>
  </head>
  <body>
  <?php
$no_visible_elements = true; ?>
<?php
include('db/config.php');

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $login_query = mysqli_query($conn, "select * from members where username='$username' and password='$password'");
  $count = mysqli_num_rows($login_query);
  $row = mysqli_fetch_array($login_query);
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];

  if ($count > 0) {
    session_start();
    $_SESSION['id'] = $row['mem_id'];
    header("Location:index2.php?status=sucsses&msg=sucsses Full Login");
  } else {
    header("Location: login.php?status=error&msg=UserName Or Password Incorrect");
    if (!empty($username) or !empty($password)) {
      $crud->login($username, $password);
    } else {
      header("Location: login.php?status=error&msg=Fill All The Fildes");
    }
?>
<?php }
}
?>


  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
  body{
    background-image: url(https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80) !important;
    background-repeat: no-repeat;
    background-size: 100%;  }
  .row{
    display: flex;
    justify-content: center;
  }
  .col-sm-5{
    display: flex;

  }
  .btn-primary{
    background-color: #f8f8f8 !important;
    color: #000;
    border: none;
  }
  .btn-primary:hover{
    background-color: grey !important;
  }
  .header-txt{
    
    text-align: center;
  }
</style>
<body>
  <div class="header-txt">
    <h2>To view or buy Products you need to login or Register</h2>
  </div>
  <div class="container-fluid">
    <div class="text-center">
    </div>
    <div class="row" style="max-height: 700px;">
      <div class="col-sm-5" style="margin-top:50px; float:left;left:100px;">
        <div class="panel panel-default text-center">
          <div class="panel-heading">
            <a href="">
              <h3 style="color: #000;">DAHO</h3>
              <a href="admin/login.php" style="float: left;color: #000;margin-top:50px; ">ADMIN</a>
            </a><br>
            <h4 style="margin-right: 40px;">Login Form</h4>
       
          </div>
          <div class="panel-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal" method="post">
              <fieldset>

                <div id="error">
                  <?php

                  if (isset($_GET['status'])) {
                    $id = $_GET['status'];
                    $msg = $_GET['msg'];
                  ?>
                    <div id="$id" class="alert alert-danger">
                      <strong>Error:</strong> &nbsp; <?php echo $msg; ?>!
                    </div>
                  <?php
                  }

                  ?>
                </div>
                <div class="input-group input-group-lg" style="width:100%;">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                  <input type="text" id="usr" name="username" placeholder="User Name" class="form-control">
                </div>
                <div class="clearfix"></div><br>
                <div class="input-group input-group-lg" style="width: 100%;">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                  <input type="password" id="usr" name="password" placeholder="Password" class="form-control">
                </div>
                <style type="text/css">

                </style>

                <div class="clearfix"></div><br>
                <input type="submit" name="login" value="Login" style="width:100%;height: 50px;background:#000;border-radius:360px;" class="btn btn-primary">
                <br><br><br>

                <p>
                  <a href="forgot.php" style="">Forgot Password?</a>
                </p>
                <p>
                  <a href="signup.php" style="">New Member Signup?</a>
                </p>
              </fieldset>
            </form>
            <script src="jquery.min.js"></script>
          </div>
        </div>
      </div>
    </div>
  </div>

  </body>
</html>