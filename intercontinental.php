<?php
include_once('classes/fooduser.php');
include_once('functionnavbar.php');
//include_once('classes/user.php');

$sql = new Food;
$res = $sql->intercontinental();
       
   if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }

?>

<!doctype html>
<html lang="en">
	<head>
		<title> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			div{
			color:green
			background-color:blue}
		</style>
	</head>
<body>
<div class="container-fluid text-center" id="#modaldata">
	<div class="row" style="background-color: #e8a392; color:#fff">
	<h2 class="mt-4 mb-3">Available deliciously made intercontinental dishes </h2>
	</div>
	<div>
	<a href="cart.php" class="btn btn-primary mt-3 mb-3">Check cart</a>
	</div>
		<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//$result2 = new User;
	
		$cart = $sql->addcart($_POST['custid'],$_POST['idfood'],$_POST['quantity']);
			

			if(empty($_POST['quantity'])){
				echo "<div class='alert alert-success'>You have not added an item to cart</div>";
			}else{
				if($cart == true){
					echo "<div class='alert alert-success'>Successfully added to cart</div>";
					//header("Location: cart.php");
				}
			}
			
		}


			if(empty($res)){
				echo "<span class='alert alert-primary'>No local food available</span>";
			}else{
				foreach ($res as $key => $value) {
			?>
			<div class="box" style="width: 350px; margin-top: 25px; text-align:left; float: left;">
				
					<img class= "imgsmall" src ="foodimages/<?php echo $value['foodimage']?>" style="width:250px; height:250px;"/>
				<div style="float: left;">		
					<br>
					<?php
						$idfood=$value['idfood'];
						$foodtitle = $value['foodtitle'];
						$fooddescription = $value['fooddescription'];
						$foodprice = $value['foodprice'];
						//$quantity = $_POST['quantity'];
					?>
					<?php echo "<strong>Food: </strong>".$foodtitle; ?>
					<br>
					<?php echo "<strong>Food description: </strong>".$fooddescription; ?>
					<br>
					<?php echo "<strong>Price: </strong>".$foodprice; ?>
					<br>
			<form action="" method="post" id="fom-data">
			
			<input type="hidden" name= "custid" value="<?php echo $myid; ?>">	
			<input type="hidden" name="idfood" value="<?php echo $value['idfood']; ?>">
			<button type="button" class="btn btn-primary" onclick="decrement(this)">-</button>
			<input type="number" name="quantity" id="demoInput" min=0 style="width: 80px;">
			<button type="button" class="btn btn-danger" onclick="increment(this)">+</button>
			<input type="hidden" name="name" value="<?php echo $value['foodtitle']; ?>">
			<input type="hidden" name= "price" value="<?php echo $value['foodprice']; ?>">
			<button type="submit" class="btn ml-3" name="btn" class="addToCart" style="background-color: #e8a392; color:#fff"><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
			
			<!-- <button type="submit"><i class="fa-solid fa-cart-shopping"></i></button> -->
			</form>
				</div>
			</div>	
		
			<?php
				}

			}
			?>
		
	</div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript">
	
		function increment(element){
			element.previousElementSibling.stepUp();

		}
		function decrement(element){
			element.nextElementSibling.stepDown();

		}
		
	</script>
</body>
</html>	