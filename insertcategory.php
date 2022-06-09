<?php


include_once("adminnavbar.php");
include_once("classes/fooduser.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(empty($_POST['category_type']) ){
		echo "<span class='ml-5 mt-5 alert alert-danger'>Please fill in category type</span>";
	}

	else{
		$res = new Food;
		$resfood  = $res->insertCategory($_POST['category_type']);
		// var_dump($resfood);
		// 	exit; 
		echo "<span class='ml-5 mt-5 alert alert-primary'>Successfully submitted. </span>";
		
	}
}

?>
<!-- class="restaurant" -->
<BODY class="ground">
	<div class="row text-center text-light mb-5 p-2" style="background-color: #e8a392; color:#fff" >
			<h1>Insert new food category</h1>
	</div>	

	<div class="container" >
	<form class="" method="post" action="" enctype="multipart/form-data" class="mt-5 mb-5">

		
		<div class="row">
			<?php include_once("adminsidenav.php");?>
			<div class="col-md-1"></div>
			<div class="col-md-5 mt-4" >
				<div class="form-group">
					<label class="text-light text-bold">Category</label>

					<input type="text" name="category_type" class="form-control">
				</div>
				<div class="form-group mb-5">
					<label class="text-light text-bold">Category image</label>
					<input type="file" name="category_image" class="form-control">
				</div>
				<input type="submit" name="submit" class="form-control bg-primary text-light"> 
			</div>
			<div class="col-md-3">	
			</div>
		</div>
	</form>	
	</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</BODY>