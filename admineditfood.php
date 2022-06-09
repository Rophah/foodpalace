<?php 

include_once("adminnavbar.php");

include_once("classes/fooduser.php");
$objcat= new Food;
$result=$objcat->category();

$id=$_GET['id'];
$output=$objcat->findFood($id);

?>

<body class="ground">
<!-- Page Content -->
  <div class="container-fluid mt-3">
 
    <div class="row ">
      <?php include_once("adminsidenav.php");?>
      <div class="col-md-6 mb-4">
        <h1 class="mt-4 mb-3">Edit food page
      <!-- <small>Edit</small> -->

      </h1>
      <?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$foodname=$_POST['foodname'];
		$fooddesc=$_POST['fooddesc'];
		$foodprice=$_POST['foodprice'];
		$foodimage=$_FILES['foodimage'];
		$foodcategory=$_POST['category'];

		if(empty($foodname) || empty($fooddesc) || empty($foodprice)||empty($foodimage) || empty($foodcategory)){
			echo "<span class='text-danger'>Kindly Complete all Fields</span>";
		}else{
			include_once("classes/fooduser.php");
			$objfood=new Food;
			$result=$objfood->updateFood($foodname,$fooddesc,$foodprice,$foodimage,$foodcategory);
			if($result==true){
				echo "<span class='text-danger'>Food Updated Sucessfully</span>";
			}else{
				echo "<span class='text-danger'>Could Not add Food</span>";
			}

		}
	}

?>
      <form action="<?php echo htmlspecialchars($_SERVER ['PHP_SELF']); ?>?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
      	<div>
      		<label>Name of Food:</label>
      		<input type="text" name="foodname" class="form-control" value="<?php if(isset($output['foodtitle'])){ echo $output['foodtitle'];} ?>">
      	</div>
      	<div>
      		<label>Food Description:</label>
      		<input type="text" name="fooddesc" class="form-control" value="<?php if(isset($output['fooddescription'])){ echo $output['fooddescription'];} ?>">
      	</div>
      	<div>
      		<label>Food Price:</label>
      		<input type="text" name="foodprice" class="form-control" value="<?php if(isset($output['foodprice'])){ echo $output['foodprice'];} ?>">
      	</div>
      	<div>
      		<img src="foodimages/<?php echo $output['foodimage']?>" style='width:45px;'>
      		<label>Food Image</label>
      		
            <input type="file" class="form-control" id="foodimage" name='foodimage'  >
      	</div>
      	<div>
      		<select name="category" class="form-control mt-3">
            <option value="">Categories of food</option>
            <?php
              
              foreach ($result as $key => $value) {
                $idcategory= $value['idcategory'];
                $categorytype = $value['category_type'];
                if(isset($output['idcategory']) && $output['idcategory']==$idcategory){
                	echo "<option value='$idcategory' selected>$categorytype</option>";
                }else{
                	echo "<option value='$idcategory'>$categorytype</option>";
                }
                
              ?>
            <?php }
            ?>
          </select>
      	</div>
      	<div>
      		<button type="submit" class="btn mt-3 form-control" name="submit" id="sendMessageButton" value="" style="background-color:#ff006f ">UPDATE FOOD DETAILS</button>
      	</div>
      		<input type="hidden" name="foodimage" value="<?php if(isset($output['foodimage'])){echo $output['foodimage']; } ?>" >
      </form>
      </div>
      <div class="col-md-3"></div>
     </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>