<?php

session_start();
if(!isset($_SESSION['orptiyek']) && !isset($_SESSION['email'])){
  header("Location: adminlogin.php?msg=Please login to continue ");
exit;
}
	include_once("adminnavbar.php");
	include_once('classes/fooduser.php');

	$sql = new Food;
	$idfood= $_GET['id'];
	$result = $sql->findfood($idfood);

	//var_dump($result);
?>

<!-- Page Content -->
  <div class="container-fluid mt-3">
 
    <div class="row ">
      <div class="col-md-3 mt-3">
			<div class="list-group">
				<a href="addproduct.php" class="list-group-item ">Add product</a>
				<a href="listfood.php" class="list-group-item ">List available food</a>
				<a href="admineditfood.php" class="list-group-item ">Edit product</a>
				<a href="" class="list-group-item ">Order</a>
				<a href="" class="list-group-item ">Delivery</a>
				<a href="adminlogoutfood.php" class="list-group-item ">Log out</a>
			</div>
		</div>
      </div>
      <div class="col-md-6 mb-4">
        <h1 class="mt-4 mb-3">Add Product page
      <small>Edit</small>
      </h1>
        <?php

        if(isset($_POST['submit'])){

          $error = array ();
          if(empty($_POST['foodname'])){
            $error[] = "Please fill in the name of the food";
          }
          if(empty($_POST['fooddescription'])){
            $error[] = "Please fill in the food description";
          }
          if(empty($_POST['foodprice'])){
            $error[] = "Please fill the price";
          }
          
          
          if(!empty($error)){
            echo "<ul class='alert alert-danger'>";
            foreach ($error as $key => $value) {
              echo "<li>$value</li>";
            }
            echo "</ul>";
          }
          else {
            $output = $newobj->addproduct($_POST['foodname'], $_POST['fooddescription'], $_POST['foodprice'],$_POST['category']);
            echo $output;
            //header("Location: order.php");
            
          }
        }

        ?>

        <form name="" id="registerform" action='' method="post" enctype="multipart/form-data">
          <div class="control-group form-group">
            <div class="controls">
              <label>Name of food</label>
              <input type="text" class="form-control" id="fname" name='foodname' value="<?php

                if(isset($_POST['foodname'])){
                  echo $_POST['foodname'];
                }
              ?>">
              
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Food description</label>
              <textarea class="form-control mt-2" name="fooddescription" id="message" value="<?php

                if(isset($_POST['fooddescription'])){
                  echo $_POST['fooddescription'];
                }
              ?>"></textarea> 
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label>Food price</label>
              <input type="text" class="form-control" id="foodprice" name='foodprice' value="<?php

                if(isset($_POST['foodprice'])){
                  echo $_POST['foodprice'];
                }
              ?>">
              
            </div>
          </div>
         <!-- <p class="help-block text-muted">We promise never to spam you!</p> -->
         <div class="control-group form-group">
            <div class="controls">
              <label>Food image</label>
              <input type="file" class="form-control" id="foodimage" name='foodimage' value="<?php

                if(isset($_POST['foodimage'])){
                  echo $_POST['foodimage'];
                }
              ?>">
              
            </div>
          </div>
          <select name="category" class="form-control">
            <option value="">Categories of food</option>
            <?php
              
              foreach ($result as $key => $value) {
                $idcategory= $value['idcategory'];
                $categorytype = $value['category_type'];
                echo "<option value='$idcategory'>$categorytype</option>";
              ?>
            <?php }
            ?>
          </select>
          <button type="submit" class="btn mt-3 form-control" name="submit" id="sendMessageButton" value="" style="background-color:#ff006f ">Sign Up</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->