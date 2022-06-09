<?php 

include_once("adminnavbar.php");

include_once("classes/tablereservation.php");
$objcat= new Table;


$id=$_GET['id'];
$output=$objcat->findtablereserve($id);

// echo "<pre>";
//       print_r($output);
//       echo "</pre>";
      

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
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$guest=$_POST['guest'];
    $types = $_POST['types'];
    $reservedate = $_POST['reservedate'];
    $reservetime = $_POST['reservetime'];
    $specialrequest = $_POST['specialrequest'];
    $status = $_POST['status'];

		if(empty($firstname) || empty($lastname) || empty($phone)||empty($email) || empty($guest) || empty($types) || empty($reservedate) || empty($reservetime) || empty($specialrequest) || empty($status) ){
			echo "<span class='text-danger'>Kindly Complete all Fields</span>";
		}else{
			include_once("classes/fooduser.php");
			$objfood=new Table;
			$result=$objfood->updateTable($firstname,$lastname,$phone,$email,$guest, $types,$reservedate,$reservetime,$specialrequest,$status, $_POST['idtablereservation']);

      // echo "<pre>";
      // print_r($result);
      // echo "</pre>";
      // exit;
			if($result==true){
				echo "<span class='text-danger'>Table reservation Updated Sucessfully</span>";
			}else{
				echo "<span class='text-danger'>Could Not Update table reservation</span>";
			}

		}
	}

?>
      <form action="<?php echo htmlspecialchars($_SERVER ['PHP_SELF']); ?>?id=<?php echo $_GET['id'];?>" method="post">
      	<div>
      		<label>First name:</label>
      		<input type="text" name="firstname" class="form-control" value="<?php if(isset($output[0]['firstname'])){ echo $output[0]['firstname'];} ?>">
      	</div>
      	<div>
      		<label>Last name:</label>
      		<input type="text" name="lastname" class="form-control" value="<?php if(isset($output[0]['lastname'])){ echo $output[0]['lastname'];} ?>">
      	</div>
      	<div>
      		<label>Phone number:</label>
      		<input type="text" name="phone" class="form-control" value="<?php if(isset($output[0]['phone'])){ echo $output[0]['phone'];} ?>">
      	</div>
      	<div>
          <label>Email:</label>
          <input type="text" name="email" class="form-control" value="<?php if(isset($output[0]['email'])){ echo $output[0]['email'];} ?>">
        </div>
        <div>
          <label>Number of guest:</label>
          <input type="text" name="guest" class="form-control" value="<?php if(isset($output[0]['guest'])){ echo $output[0]['guest'];} ?>">
        </div>
        <div>
          <label>Type of reservation:</label>
          <input type="text" name="types" class="form-control" value="<?php if(isset($output[0]['types'])){ echo $output[0]['types'];} ?>">
        </div>
        <div>
          <label>Reserved date:</label>
          <input type="date" name="reservedate" class="form-control" value="<?php if(isset($output[0]['reservedate'])){ echo $output[0]['reservedate'];} ?>">
        </div>
        <div>
          <label>Reserved time:</label>
          <input type="time" name="reservetime" class="form-control" value="<?php if(isset($output[0]['reservetime'])){ echo $output[0]['reservetime'];} ?>">
        </div>
        <div>
          <label>Any special request:</label>
          <input type="text" name="specialrequest" class="form-control" value="<?php if(isset($output[0]['specialrequest'])){ echo $output[0]['specialrequest'];} ?>">
        </div>
        <div>
          
          <input type="hidden" name="idtablereservation" class="form-control" value="<?php if(isset($output[0]['idtablereservation'])){ echo $output[0]['idtablereservation'];} ?>">
        </div>
      	<div>
          <label>Status of reservation:</label>
      		<select name="status" class="form-control mt-3" value="if(isset($value[0]['status'])){echo $value[0]['status']}">   
            <option name="status" value="new">New</option>
            <option name="status" value="cancelled">Cancelled</option>
            <option name="status" value="completed">Completed</option>
          </select>
      	</div>
      	<div>
      		<button type="submit" class="btn mt-3 form-control text-light" name="submit" id="sendMessageButton" value="" style="background-color:#ff006f ">UPDATE RESERVED TABLE</button>
      	</div>
      		
      </form>
      </div>
      <div class="col-md-3"></div>
     </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>