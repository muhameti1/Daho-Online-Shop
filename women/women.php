<?php require('../db/session.php'); ?>

<?php

require_once("db/dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM women WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'img_path' => 'women/' . $_POST["img_path"]));

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
  <link rel="stylesheet" href="women.css">

  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
    
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
          <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
            <?php
            $result = mysqli_query($conn, "select *  from members where mem_id='$id_session'") or die(mysqli_error());
            while ($row = mysqli_fetch_array($result)) {
              $id = $row['mem_id'];
            ?>
              <li class="dropdown">
              <i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
                  <span class="caret" style="color: #ffffff;"></span></a>
                <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
                  <li><a href="" style="color: #ffffff;">Hello:<?php echo $row['username']; ?></a></li>
                  <li><a href="uploadf.php">Uploadproduct</a></li>
                  <li><a href="profile.php<?php echo '?mem_id=' . $id; ?>">EditProfile</a></li>
                  <li><a href="logout.php">LogOut</a></li>
                </ul>
              </li>
              <li class="checkout">
									<a href="#">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <li class="font"><a href="shopping_cart.php" style="background:#F8F8F8;border-radius:360px;margin-top:15px;margin-right:10px;"><?php echo $session_items; ?></a></li>
									</a>
							

        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div class="txt-heading" style="text-align:left;color:#d5d5d5;"><a href="../index2.php" style="text-decoration:none;color:#000;margin-left:120px;">Home > </a> Products > <a href="women.php" style="color:#000;text-decoration: none;">Woman</a></div>
<hr>
  <div class="container-fluid" style="width:90%;">
    <div class="row">
      <div class="col-sm-2" style="background-color:#ffff;color:#428bca;">


        <p  class="goto" style="color:#000;font-weight:bolder;text-align: center; ">Product Category</p>
        <ul class="ul-goto">
          <li class="lista"><a  class="a" href="../men/mens.php">Man</a></li>
          <li class="lista"><a class="a"  href="women.php">Woman</a></li>
          <li class="lista"><a  class="a" href="../kids/kids.php">Kids</a></li>

        </ul>

      <?php } ?>
    <?php } ?>

      </div>
      <div class="col-sm-9" style="background-color:#F8F8F8;margin-left: 10px;">
        <div id="product-grid">
          <?php
          $product_array = $db_handle->runQuery("SELECT * FROM women ORDER BY id ASC");
          if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
          ?>
              <div class="product-item" style="background:#fff; border-radius:20px;">
                <form method="post" action="women.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <input type="hidden" name="img_path" value="girlsproduct/<?php echo $product_array[$key]["image"]; ?>">
                  <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="girlsproduct/<?php echo $product_array[$key]["image"]; ?>"></div>
                  <div><strong>PRODUCT:<?php echo $product_array[$key]["name"]; ?></strong></div>
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
  <script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>
</body>

</html>