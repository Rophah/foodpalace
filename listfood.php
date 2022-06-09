<?php
	include_once("adminnavbar.php");

?>

<body class="ground">
<div class="container" style='min-height:500px'>
	<h1 class="mt-4 mb-3 text-light">List of all available food  </h1>
	<small></small>
    <div class="row">
     	<?php include_once("adminsidenav.php");?>

      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
      <div style='text-align:right'>
	  <a class='btn btn-info mb-4' href="addproduct.php">Add another food</a>
	  
	</div>
	<table class="table table-striped bg-light mt-5">
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
			include_once('classes/fooduser.php');
			$sql = new Food;
			$result = $sql->getFood();
			//var_dump($result);
			$counter = 1;
			?>
			<?php
				foreach ($result as $key => $value) {
				$id=$value['idfood'];	
				?>
			<tr>
				
				<th scope="col"><?php echo $counter++; ?></th>
				<td scope="col"><?php echo $value['foodtitle']; ?></td>
				<td scope="col"><?php echo $value['fooddescription']; ?></td>
				<td scope="col"><?php echo $value['foodprice']; ?></td>
				<td scope="col"><img src="foodimages/<?php echo $value['foodimage']?>" style='width:100px'></td>
				<td scope="col"><?php echo $value['category_type']; ?></td>
				<td scope="col">
					<a href="admineditfood.php?id=<?php echo $id; ?>" class='btn-primary btn-sm mb-2'>Edit</a>
					<!-- <a href="deletefood.php?id=<?php //echo $id; ?>" class='btn-danger btn-sm'>Delete</a>
					<input type="button" onclick="deleteme(<?php //recho $id; ?>)" name="Delete" value="Delete" > -->
				</td>
			</tr>

			<!-- JavaScript function for deleting-->
			 <script type="text/javascript">
			 	function deleteme(delid){
			 		if(confirm("Do you want to delete?")){
			 			window.location.href='deletefood.php?del_id=' +delid+'';
			 			return true;
			 		}
			 	}

			 </script>

			<?php }?>
		</tbody>
	</table>


</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>