<?php require('../db/session.php'); ?>

<?php
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM men WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'img_path' => 'men/' . $_POST["img_path"]));

        if (!empty($_SESSION["cart_item"])) {
          if (in_array($productByCode[0]["code"], $_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
              if ($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
            }
          } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
          }
        } else {
          $_SESSION["cart_item"] = $itemArray;
        }
      }
      break;
  }
}
?>
<!DOCTYPE html>

<html>

<head>
  <title>DAHO - Online Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
    body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font: 400 15px/1.8;
    color: #777;
    font-weight: 600px;
    background-color: #fff;

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

  .carousel-indicators {
    color: red;
  }

  .glyphicon-chevron-right {
    color: #000;
    font-size: 24px;
  }

  .glyphicon-chevron-left {
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

  .bg-1 h3 {
    color: #fff;
  }

  .bg-1 p {
    font-style: italic;
  }

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

  .btn:hover,
  .btn:focus {
    border: 1px solid #333;
    color: #000;
  }

  .modal-header,
  .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }

  .modal-header,
  .modal-body {
    padding: 40px 50px;
  }

  .nav-tabs li a {
    color: #777;
  }


  #font {
    color: #000 !important;
  }

  .font a {
    color: #000 !important;
  }

  .font a:hover {
    color: #333 !important;
  }

  .font li.active a {
    color: #000 !important;
  }

  .navbar {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    height: 70px;
    margin-bottom: 0;
    background-color: white;
    border: 0;
    font-size: 14px !important;
    font-weight: 500;
    letter-spacing: 3px;
    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

  }

  .navbar li a,
  .navbar .navbar-brand {
    margin-top: 13px;
    color: #000 !important;
  }

  .font.navbar-brand {
    color: #000 !important;
  }

  .navbar-nav li a:hover {
    color: #848283 !important;
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

  .txt-heading {
    margin-top: 30px;
    margin-bottom: 10px;
    background-color: white;
  }
  .lista{
    list-style-type: style circle;;
    margin-top: 15px;
    margin-bottom: 15px;
    color: #000;
  }
  .col-sm-2{
    border-radius: 10px;      
  }
  .ul-goto{
      margin-bottom: 5px;
      margin-left: 30px;
  }
  .a{
      color: #000;
  }
  .goto{
      margin-top: 50px;
  }


  </style>
</head>

<body>
  <?php
  $session_items = 0;
  if (!empty($_SESSION["cart_item"])) {
    $session_items = count($_SESSION["cart_item"]);
  }
  ?>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="font" href="../index2.php">DAHO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
          <li>
            <style type="text/css">
              #keyword {
                border: #CCC 1px solid;
                border-radius: 4px;
                padding: 7px;
                background: url("demo-search-icon.png") no-repeat center right 7px;
              }
            </style>
            
          </li>
          <li class="font"><a href="../index2.php">HOME</a></li>
          <li class="active"><a href="#contact">SHOP</a></li>
          <li class="font"><a href="../about/index.php">ABOUT US</a></li>
          <li class="font"><a href="../contact-form/">CONTACT US</a></li>
          <?php require('../db/config.php'); ?>
          <?php
          $result = mysqli_query($conn, "select *  from members where mem_id='$id_session'") or die(mysqli_error());
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['mem_id'];
          ?>
            
            <li class="dropdown">
            <i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
                <span class="caret" style="color: #ffffff;"></span>
              <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
              <li><a href="" style="color: #000;">Hi:<?php echo $row['username']; ?></a></li>
                <li><a href="uploadf.php">Uploadproduct</a></li>
                <li><a href="profile.php<?php echo '?mem_id=' . $id; ?>">EditProfile</a></li>
                <li><a href="logout.php">LogOut</a></li>
              </ul>
            </li>
            <li class="font"><a href="" class="glyphicon glyphicon-shopping-cart"></a></li>
            <li class="font"><a href="shopping_cart.php" style="background:#F8F8F8;border-radius:360px;margin-top:15px;margin-right:10px;"><?php echo $session_items; ?></a></li>

        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div class="txt-heading" style="text-align:left;color:#d5d5d5;"><a href="../index2.php" style="text-decoration:none;color:#000;margin-left:120px;">Home > </a> Products > <a href="../women/women.php" style="color:#000;text-decoration: none;">Man</a></div>
  <hr>

  <div class="container-fluid" style="width:90%;">
    <div class="row">
      <div class="col-sm-2" style="background-color:#ffff;color:#428bca;">


      <p  class="goto" style="color:#000;font-weight:bolder;text-align: center; ">Product Category</p>
        <ul class="ul-goto">
          <li class="lista"><a  class="a" href="../men/mens.php">Man</a></li>
          <li class="lista"><a class="a"  href="../women/women.php">Woman</a></li>
          <li class="lista"><a  class="a" href="../kids/kids.php">Kids</a></li>

        </ul>

      <?php } ?>
      </div>
      <div class="col-sm-9" style="background-color:#F8F8F8;margin-left: 10px;">
        <div id="product-grid">
          <?php
          $product_array = $db_handle->runQuery("SELECT * FROM men ORDER BY id ASC");
          if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
          ?>
               <div class="product-item" style="background:#fff; border-radius:20px;">
                <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <input type="hidden" name="img_path" value="mensproduct/<?php echo $product_array[$key]["image"]; ?>">
                  <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="mensproduct/<?php echo $product_array[$key]["image"]; ?>"></div>
                  <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
                  <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

                  <div class="product-price"> <strong>PRICE: <?php echo $product_array[$key]["price"] . " Euro"; ?></strong></div>
                  <div><input class="form-control" style="float:left;max-width:25%;border-radius:360px;" type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btn btn-primary" style="float:right;width:70%;border-radius:360px;" /></div>
                </form>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>



  <footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>© 2022 All Rights Reserved DAHO</p>
  </footer>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();

      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        if (this.hash !== "") {

          event.preventDefault();


          var hash = this.hash;


          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function() {

            window.location.hash = hash;
          });
        }
      });
    })
  </script>
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>
</body>

</html>