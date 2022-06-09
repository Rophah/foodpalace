<?php

  include_once("adminnavbar.php");
  include_once("classes/fooduser.php");
  $newobj = new Food;
  $result=$newobj->category();
  // $obj = new User;
  // $result = $obj->
?>

<body class="ground">
<!-- Page Content -->
  <div class="container mt-5">
 
    <div class="row mt-3 ">
      <?php include_once("adminsidenav.php");?>
      <div class="col-md-1"></div>
      <div class="col-md-6 mb-4">

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
            echo "<span class='alert alert-success mt-4 mb-4'>Product was successfully added to the database</span>";
          }
        }

        ?>
        <h1 class="mt-4 mb-3 text-light">Add Product page
      
      </h1>
        

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
         <div class="control-group form-group mt-3">
            <div class="controls">
              <label>Food image</label>
              <input type="file" class="form-control" id="foodimage" name='foodimage' value="<?php

                if(isset($_POST['foodimage'])){
                  echo $_POST['foodimage'];
                }
              ?>">
              
            </div>
          </div>
          <select name="category" class="form-control mt-4">
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
          <button type="submit" class="btn mt-4 form-control text-light" name="submit" id="sendMessageButton" value="" style="background-color:#ff006f ">Sign Up</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

