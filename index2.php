<?php require('db/config.php'); ?>
<?php require('db/session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>DAHO - Online Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="index2.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>

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
          <li><a href="#myPage">HOME</a></li>
          <li><a href="women/women.php">SHOP</a></li>
          <li><a href="about/index.php">ABOUT US</a></li>
          <li><a href="./contact-form/">CONTACT US</a></li>
          <?php
          $result = mysqli_query($conn, "select *  from members where mem_id='$id_session'") or die(mysqli_error());
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['mem_id'];
          ?>
          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li class="dropdown">
              <i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
                <span class="caret" style="color: #ffffff;"></span></a>
              <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
                <li><a href="" style="color: #ffffff;">Hello:<?php echo $row['username']; ?></a></li>
                <li><a href="men/profile.php<?php echo '?mem_id=' . $id; ?>">Edit Profile</a></li>
                <li><a href="men/logout.php">Log Out</a></li>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-color:#000;background-color:#000;"></li>
      <li data-target="#myCarousel" data-slide-to="1" style="border-color:#000;background-color:#000;"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="banner5.jpg" >
      </div>

      <div class="item">
        <img src="banner10.jpg">
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="our-collection">
    <h1>Our Collection</h1>
  </div>

  <div class="container-collection">
    <div class="row">
      <div class="column">
        <div class="cll1">
          <a href="men/mens.php"><img class="img1" src="man.jpg" alt="man" style="width:50% height:50%" ></a>
          <h3><a href="men/mens.php">MAN</a></h3>
        </div>
      </div>

      <div class="column">
        <a href="women/women.php"><img class="img1" src="woman.jpg" alt="woman" style="width:50% height:50%"></a>
        <h3><a href="women/women.php">WOMAN</a></h3>
      </div>

      <div class="column">
        <a href="kids/kids.php"><img class="img1" src="kidss.jpg" alt="kids" style="width:50% height:50%"></a>
        <h3><a href="kids/kids.php">KIDS</a></h3>
      </div>
    </div>
  </div>
  <div class="buffer1 col-12"></div>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM women");
  $num_rows = mysqli_num_rows($result);
  ?>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM men");
  $num_rows = mysqli_num_rows($result);
  ?>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM kids");
  $num_rows = mysqli_num_rows($result);
  ?>

  <section id="sm-banner" class="section-p1">
    <div class="banner-box">
      <h4>Crazy Deals</h4>
      <h2>Buy 1 Get 1 Free</h2>
      <span>The best classic Dress is on Sale</span>
      <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
      <h4>Spring/Summer</h4>
      <h2>Upcomming Season</h2>
      <span>The best classic Sweatshirts are on Sale</span>
      <button class="white">Collection</button>
    </div>
  </section>
  <center>
    <div class="subscribe">
      <h2 class="subscribe__title">Let's keep in touch</h2>
      <p class="subscribe__copy">Subscribe to keep up with fresh news and exciting updates. We promise not to spam you!</p>
      <div class="form">
        <input type="email" class="form__email" placeholder="Enter your email address" />
        <input class="form__button" type="submit" value="Subscribe"></input>
      </div>
      <div class="notice">
        <input type="checkbox">
        <span class="notice__copy">I agree to my email address being stored and uses to recieve monthly newsletter.</span>
      </div>
    </div>
  </center>
  </div>
  </div>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  </head>

  <body>
    <div class="content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row align-items-center">
              <div class="col-lg-7 mb-5 mb-lg-0">
                <h2 class="mb-5">Fill the form. <br> It's easy.</h2>
                <form class="border-right pr-5 mb-5" method="post" id="contactForm" name="contactForm">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 form-group">
                      <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                      <span class="submitting"></span>
                    </div>
                  </div>
                </form>
                <div id="form-message-warning mt-4"></div>
                <div id="form-message-success">
                  Your message was sent, thank you!
                </div>
              </div>
              <div class="col-lg-4 ml-auto">
                <h3 class="mb-4">Let's talk about everything.</h3>
                <p>Share your excitement with us.</p>
                <p><a href="about/index.php">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    

    <!-- Footer -->
    <footer class="text-center">
      <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </a><br><br>
      <p>
        © 2022 All Rights Reserved DAHO
      </p>
    </footer>

    <script type="text/javascript" src="index2.js"> </script>
  </body>

</html>