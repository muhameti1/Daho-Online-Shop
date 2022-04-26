<?php require("../db/session.php");?>

<?php
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
		case "edit":
			$total_price = 0;
			foreach ($_SESSION['cart_item'] as $k => $v) {
			  if($_POST["code"] == $k) {
				  if($_POST["quantity"] == '0') {
					  unset($_SESSION["cart_item"][$k]);
				  } else {
					$_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
				  }
			  }
			  $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];	
				  
			}
			if($total_price!=0 && is_numeric($total_price)) {
				print "$" . number_format($total_price,2);
				exit;
			}
		break;	
	}
}
?>
<html>
<head>
<title>DAHO - Shopping Cart</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<style>
	 body {
     font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font: 400 15px/1.8 ;
      color: #777;
      font-weight:600px;
      background-color:#ffffff;

  }
  .nav-tabs li a {
      color: #777;
  }
  .navbar{
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
.txt-heading{padding: 5px 10px;font-size:1.1em;font-weight:bold;color:#999;}
.btnRemoveAction{position: absolute;
    top: -10;
    right: -8;display:none;	    
    font-size: 2em;
	}
.btnRemoveAction a{
    color: #D60202;
    text-decoration: none;
    margin-bottom:2px;}
#btnEmpty{background-color:#D60202;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;float:right;text-decoration:none;}
#shopping-cart table{width:100%;background-color:#F0F0F0;}
#shopping-cart table td{background-color:#FFFFFF;}
.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
#product-grid {margin-bottom:30px; max-width:100%;text-align:center;}
.txt-heading {
    background-color: #ffffff;
    color:grey;
	margin-top: 0px;
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
.fa{
	margin-left: 15px;
}
#price{
	background-color: #66b3ff;}
#clear-cart{
	background-color: #ff6666 !important;
}
.col-sm-9{
  background-color: #f8f8f8 !important;
}

</style>
<body style="background: #fff; ">
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
    <?php require ('../db/config.php'); ?>
     
     <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
<?php
              $result= mysqli_query($conn,"select * from members where  mem_id = $id_session") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['mem_id'];
              ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
        <li class="font"><a href="../index2.php">HOME</a></li>
		<li class="font"><a href="../men/mens.php">SHOP</a></li>
        
        <li class="dropdown">
		<i class="fa fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown" href="#" style="height: 50px; margin-top:30px"></i>
          <span class="caret" style="color: #ffffff;"></span></a>
          <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
		  <li class="font"><a href="">Hi:<?php echo $row['username']?></a></li>
            <li><a href="uploadf.php">Uploadproduct</a></li>
            <li><a href="profile.php<?php echo '?mem_id='.$id; ?>">EditProfile</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
        </li>
         <?php }?>
     <?php } ?>
      </ul>
    </div>
  </div>
</nav><br><br><br><br>
<div class="txt-heading" style="height:40px;"><span style="margin-left:100px;"><a href="../index2.php" style="color:#000;text-decoration:none;">Home ></a> Product > <a href="mens.php" style="color:#000;text-decoration:none;">Men ></a> AddToCart</span></div>
<hr>
 <div class="container-fluid" style="max-width:95%;">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-9" style="background-color:#F8F8F8">
      <div id="shopping-cart" >
<form name="frmCartEdit" id="frmCartEdit">
<?php
$total_price = 0.00;
if(isset($_SESSION["cart_item"])){
?>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
		$total_price += $item["price"] * $item["quantity"];	
?>
	<div style="background:#fff;" class="product-item" onMouseOver="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='';" >
		<div class="product-image"><img style="max-width: 250px;max-height: 250px;" src="../<?php echo $item["img_path"]; ?>"></div>
		<div><strong><?php echo $item["name"]; ?></strong></div>
		<div class="product-price"><?php echo $item["price"]." Euro"; ?></div>
		<div>Quantity: <input type="text" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onBlur="saveCart(this);" /></div>
		<div class="btnRemoveAction" id="remove<?php echo $item["code"]; ?>"><a href="shopping_cart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart">x</a></div>
	</div>
<?php
	}
}
?>
</form>
<span id="price" class="label label-danger" style="margin-left:300px;font-size:20px;">Your Total Price Is: <span id="total_price"><?php echo  number_format($total_price,2). " Euro "; ?></span></span>
<div class="cart_footer_link" style="margin-top:30px;margin-left:200px;">
<a id="clear-cart"href="shopping_cart.php?action=empty" class="btn btn-danger" style="border-radius:5px;width:150px;">Clear Cart</a>
<a id="price" href="mens.php" title="Cart" class="btn btn-primary" style="border-radius:5px;width:180px;">Continue Shopping</a>
<a id="price" href="#" class="btn btn-primary" style="border-radius:5px;width:180px;">Order</a>
</div> 
</div>
    </div>
  </div>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script>
function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data)},
		error: function () {alert("Problen in sending reply!")}
	});
}
</script>
<script src="https://kit.fontawesome.com/d767c991a5.js" crossorigin="anonymous"></script>
</body>
</html>