<?php
include_once('classes/fooduser.php');
include_once("functionnavbar.php");

$sql = new Food;
$res = $sql->categoryindexpage();
// echo "<pre>";
// print_r($res);
// echo "</pre>";
// exit;
?>

<section id="category" style="background-color:#2C2929; color: #ffffff;">
<div class="container">
	<div class="col pt-5">
				<h2 class="text-center text-uppercase">Categories of foods available</h2>
			</div>
	
	<div class="row p-5">

		<?php
			if(empty($res)){
				echo "<span class='alert alert-primary'>No local food available</span>";
			}else{
				foreach ($res as $key => $value) {
			?>
				<div class="col text-center mb-5" style="float:left;">
					<img src="foodimages/<?php echo $value['category_image'];?>" class="" style="width: 250px; height: 250px">
					<h5 class="text-center text-bold py-3 "><?php echo $value['category_type'];?></h5>

					<?php

					$type = $value['category_type'];
						if($type == 'local dish'){
					?>
					<a href="localdish.php" class="btn btnsecondary">View more</a>
					<?php		
						}else if($type == 'Intercontinental dishes'){
					?>
					<a href="intercontinental.php" class="btn btnsecondary">View more</a>	
					<?php
						}else{
					?>
					<a href="snacks.php" class="btn btnsecondary">View more</a>
					<?php
						}
					?>
				</div>
			
			<?php
				}

			}
			?>
	
	</div>
</div>
</section>
<?php
include_once("frontfooter.php");

?>