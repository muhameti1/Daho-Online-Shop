<?php require('../db/session.php'); ?>

<?php
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM kids WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'img_path' => 'kids/' . $_POST["img_path"]));

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
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>

  <style>
  body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font: 400 15px/1.8;
    color: #777;
    font-weight: 600px;
    background-color: #fff;
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
   font-weight: 500;
   letter-spacing: 3px;
   box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

 }

 .navbar li a,
 .navbar .navbar-brand {
   margin-top: 13px;
   color: #000 !important;
 }

 .navbar-nav li a:hover {
   color: #848283 !important;
 }

 .navbar-nav li.active a {
   color: #fff !important;
   background-color: #000 !important;
 }

 .navbar-default .navbar-toggle {
   border-color: transparent;
 }

 .open .dropdown-toggle {
   color: #fff;
   cursor: pointer;
 }
 .open .dropdown-toggle:hover{
   background-color: #000;
 }

 .dropdown-menu li a {
   color: #000 !important;
   background: no-repeat;
 }

 .dropdown-menu li a:hover {
   background-color: #d1d1d1 !important;
 }

.txt-heading{padding: 5px 10px;font-size:1.1em;font-weight:bold;color:#999;}
.btnRemoveAction{position: absolute;
   top: -10;
   right: -8;display:none;	    
   font-size: 2em;
   }
.btnRemoveAction a{
   color: #D60202;
   text-decoration: none;
   font-family: sans-serif;margin-bottom:2px;}
#btnEmpty{background-color:#D60202;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;float:right;text-decoration:none;}
#shopping-cart table{width:100%;background-color:#F0F0F0;}
#shopping-cart table td{background-color:#FFFFFF;}
.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
#product-grid {margin-bottom:30px; max-width:100%;text-align:center;}
.txt-heading {
   background-color: #fff;
   color:#000;
    }

.text-heading a:hover{
   margin-left: 100px;
   text-decoration: none;
   color: red;
}
.product-item {	
   box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
   border-radius: 5px;
   margin: 15px;
   padding: 5px;
   display: inline-block;
   position:relative;
   }
.product-item div{text-align:center;	margin:12px;}
.product-price {color:#000;}
.product-image {height:200px;width:200px;background-color:#FFF;}
.top_links{text-align:right;padding:5px}
.top_links a {
   color: #09f;
   text-decoration:none
}
.product-image img {
   object-fit: contain !important;
   height: 100% !important;
   width: 100% !important;
}
#font {
    color: #000 !important;
}
.txt-heading{
  margin-top: 30px;

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
  footer{
    background-color: #2d2d30;
    color: #fff;
    padding: 32px;
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
          </li>
          <li class="font"><a href="../index2.php">HOME</a></li>
          <li class="active"><a href="../women/women.php">SHOP</a></li>
          <li class="font"><a href="../about/index.php">ABOUT US</a></li>
          <li class="font"><a href="#contact">CONTACT US</a></li>
          <?php require('../db/config.php'); ?>
          <?php
          $result = mysqli_query($conn, "select *  from members where mem_id='$id_session'") or die(mysqli_error());
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['mem_id'];
          ?>
            <li class="dropdown">
            <i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
                <span class="caret" style="color: #ffffff;"></span></a>
              <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
              <li><a href="" style="color: #ffffff;">Hi:<?php echo $row['username']; ?></a></li>

                <li><a href="uploadf.php">Upload product</a></li>
                <li><a href="profile.php<?php echo '?mem_id=' . $id; ?>">Edit Profile</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </li>
            <li class="font"><a href="" class="glyphicon glyphicon-shopping-cart"></a></li>
            <li class="font"><a href="shopping_cart.php" style="background:#f8f8f8;border-radius:360px;margin-top:15px;margin-right:10px;"><?php echo $session_items; ?></a></li>

        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div class="txt-heading" style="text-align:left;color:#d5d5d5;"><a href="../index2.php" style="text-decoration:none;color:#000;margin-left:120px;">Home ></a> Products > <a href="" style="color:#000;text-decoration: none;">Kids</a></div>
<hr>
  <div class="container-fluid" style="width:90%;">
    <div class="row">
      <div class="col-sm-2" style="background-color:#fff;color:#428bca;">


        <p class="goto" style="color:#000;font-weight:bolder;text-align: center;">Product Category</p>
        <ul class="ul-goto">
          <li class="lista"><a class="a" href="../men/mens.php">Man</a></li>
          <li class="lista"><a class="a" href="../women/women.php">Woman</a></li>
          <li class="lista"><a class="a" href="">Kids</a></li>

        </ul>

      <?php } ?>

      </div>
      <div class="col-sm-9" style="background-color:#f8f8f8;margin-left: 10px;">
        <div id="product-grid">
          <?php
          $product_array = $db_handle->runQuery("SELECT * FROM kids ORDER BY id ASC");
          if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
          ?>
              <div class="product-item" style="background:#fff;border-radius:20px;">
                <form method="post" action="kids.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <input type="hidden" name="img_path" value="product/<?php echo $product_array[$key]["image"]; ?>">
                  <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="product/<?php echo $product_array[$key]["image"]; ?>"></div>
                  <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
                  <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

                  <div class="product-price"><strong>PRICE:<?php echo $product_array[$key]["price"] . " Euro"; ?></strong></div>
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
</body>

</html>