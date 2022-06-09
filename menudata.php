<?php
	
	include_once("functionnavbar.php");
	include_once("classes/fooduser.php");
	include_once("classes/useredit.php");

	if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
    //echo $myid;
  }

$sql = new Food;
?>
<div class="container-fluid text-center">
	<div class="row" style="background-color: #e8a392; color:#fff">
		<h1 class="mt-4 mb-3" >List of all available food  </h1>
	</div>
	<div>
	<a href="cart.php" class="btn btn-primary mt-3">Check cart</a>
	</div>
</div>

<!--start function add to cart-->
<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
			if(empty($_POST['quantity'])){
				echo "<div class='alert alert-success text-center'>You have not added an item to cart</div>";
			}else{
				$cart = $sql->addcart($myid,$_POST['idfood'],$_POST['quantity']);
				if($cart == true){
					echo "<div class='alert alert-success text-center'>Successfully added to cart</div>";
					//header("Location: cart.php");
				}
			}
			
		}

?>
<!--add function add to cart-->
<div class="container" style='min-height:500px'>
	
    <div class="row">
 
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
    
	</div> 
	<table class="table table-striped mt-5">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Food name</th>
				<th scope="col">Food description</th>
				<th scope="col">Food price</th>
				<th scope="col">Food image</th>
				<th scope="col">Food category</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			//$sql = new Food;
			$result = $sql->getFood();
			
			$counter = 1;
			?>
			<?php
				foreach ($result as $key => $value) {
				$id=$value['idfood'];	
				?>
			<tr>
				
				<th scope="col"><?php echo $counter++; ?></th>
				<td scope="col"><?php echo $value['foodtitle']; ?></td>
				<td scope="col" style="max-width: 100px"><?php echo $value['fooddescription']; ?></td>
				<td scope="col"><?php echo $value['foodprice']; ?></td>
				<td scope="col"><img src="foodimages/<?php echo $value['foodimage']?>" style='width:120px'></td>
				<td scope="col" style="max-width: 100px"><?php echo $value['category_type']; ?></td>
				<td scope="col" style="min-width: 100px">
					<form method="POST" action="">
						<input type="hidden" name= "custid" value="<?php echo $myid; ?>">	
						<input type="hidden" name="idfood" value="<?php echo $value['idfood']; ?>">
						
						<button type="button" class="btn btn-primary" onclick="decrement(this)">-</button>
						<input type="number" name="quantity" id="demoInput" min=0 style="width: 80px;">
						<button type="button" class="btn btn-danger" onclick="increment(this)">+</button>
						<button type="submit" class="btn btn-success ml-3" name="btn" style="background-color: #e8a392; color:#fff" class="addToCart" ><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
					</form>
				</td>
				<td scope="col">
					
				
				</td>
			</tr>

			<?php }?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="js/jquery.min.js">	
	</script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	function increment(element){
			element.previousElementSibling.stepUp();

		}
		function decrement(element){
			element.nextElementSibling.stepDown();

		}


	$(document).ready(function(){

		$('#search').quicksearch('table tbody tr', {
    'delay': 100,
    'bind': 'keyup keydown',
    'show': function() {
        if ($('#search').val() === '') {
            return;
        }
        $(this).addClass('show');
    },
    'onAfter': function() {
        if ($('#search').val() === '') {
            return;
        }
        $('html,body').scrollTop($('.show:first').offset().top);
    },
    'hide': function() {
        $(this).removeClass('show');
    },
    'prepareQuery': function(val) {
        return new RegExp(val, "i");
    },
    'testQuery': function(query, txt, _row) {
        return query.test(txt);
    }
});

$('#search').focus();

	})
</script>


