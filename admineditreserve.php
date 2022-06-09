<?php

include_once('classes/tablereservation.php');
include_once('"adminnavbar.php"');

$id = $_GET['id'];
$obj = new Table;

$output = $obj-> findtablereserve($id);
var_dump($output['lastname']);
exit;
?>
<div class="container-fluid mt-3">
 
    <div class="row ">
	      <div class="col-md-3 mt-3">
		      <div class="list-group">
		        <a href="addproduct.php" class="list-group-item ">Add product</a>
                        <a href="listfood.php" class="list-group-item ">List available food</a>
                        <a href="admineditfood.php" class="list-group-item ">Edit product</a>
                        <a href="listtablepreserve.php" class="list-group-item ">List of reserved table</a>
                        <a href="listtablepreserve.php" class="list-group-item ">Edit reserved table</a>
                        <a href="insertcategory.php" class="list-group-item ">Insert new food category</a>
                        <a href="" class="list-group-item ">Delivery</a>
                        <a href="logoutfood.php" class="list-group-item ">Log out</a>
		      </div>
	      </div>
      <div class="col-md-6 mb-4">
        <h1 class="mt-4 mb-3">Edit food page
      <!-- <small>Edit</small> -->
      	</h1>

      	<?php
      		if($_SERVER['REQUEST_METHOD'] == 'POST'){
      			$fname = $_POST['fname'];
      			$lname = $_POST['lname'];
      			$phone = $_POST['phone'];
      			$email = $_POST['email'];
      			$num	= $_POST['num'];
      			$type = $_POST['type'];
      			$date = $_POST['date'];
      			$time = $_POST['time'];
      			$request = $_POST['request'];
      			$status = $_POST['status'];

      			if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($num) || empty($type) || empty ($date) || empty($time) || empty($request) || empty($status)){
      				echo "<span class='text-danger'>Kindly Complete all Fields</span>";
      			}else{
      				$result = $obj->updatereservetable($fname, $lname, $phone,$email,$num,$type,$date,$time,$request,$status);
      				if($result == true){
      					echo "<span class='text-success'>Reserve table successfully updated</span>";
      				}else{
      					echo "<span class='text-success'>Could not update table successfully</span>";
      				}
      			}
      		}
      	?>          
            <div class="card mt-5">
                  <div class="card-header">
                        Reserve a table
                  </div>
                  <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER ['PHP_SELF']); ?>?id=<?php echo $_GET['id'];?>" method="post">
                              <div>
                              <input type="text" name="fname" class="form-control mb-2" placeholder="First name" value="<?php if(isset($output['firstname'])){ echo $output['firstname'];} ?>">
                              </div>
                              <input type="text" name="lname" class="form-control mb-2" placeholder="Last name">
                              <?php if(isset($output['lname'])){ echo $output['lname'];} ?>
                              <input type="text" name="phone" class="form-control mb-2" placeholder="Phone number">
                              <?php if(isset($output['phone'])){ echo $output['phone'];} ?>
                              <input type="email" name="email" class="form-control mb-2" placeholder="email">
                              <?php if(isset($output['email'])){ echo $output['email'];} ?>
                              <input type="text" name="guest" class="form-control mb-2" placeholder="Number of guest">
                              <?php if(isset($output['guest'])){ echo $output['guest'];} ?>
                              <input type="text" name="types" class="form-control mb-2" placeholder="Enter the type of table reservation e.g dinner, VIP,wedding" >
                              <?php if(isset($output['type'])){ echo $output['type'];} ?>
                              <input type="date" class="form-control mb-2" name="dates" placeholder="Enter the reserved date">
                              <?php if(isset($output['date'])){ echo $output['date'];} ?>
                              <input type="time" class="form-control mb-2" name="time" placeholder="Enter the reserved date">
                              <?php if(isset($output['time'])){ echo $output['time'];} ?>
                              <label>Any special request</label>
                              <textarea class="form-control mb-4" name="special"></textarea>
                              <?php if(isset($output['special'])){ echo $output['special'];} ?>
                              <!-- <select name="status" class="form-control">
                                    <option name=''>--</option>
                                    <option name='status'>New</option>
                                    <option name='status'>Cancelled</option>
                                    <option name='status'>Completed</option>
                              </select> -->
                              <input type="submit" class="form-control mb-4 text-light" name="submit" style="background-color: red;">
                              
                        </form>
                  </div>
             </div>      
      </div>	
  </div>


</div>