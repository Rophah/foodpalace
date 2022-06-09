<?php

include_once('functionnavbar.php');
$id= $_SESSION['myid'];


include_once("classes/tablereservation.php");
//include_once("adminheader.php");
	
?>
<body style="background-color: #FAF9F6 ">
<div class="container-fluid text-center">
	<div class="row" style="background-color: #e8a392; color:#fff">
		<h1 class="mt-4 mb-3" >Reserve a table</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		
	</div>	
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<div class="text-center">
			<a href="viewreservation.php" class="btn btn-success mt-5 mr-3">View reservations</a>
			<!-- <a href="viewreservation.php" class="btn btn-info mt-5 mr-3">Edit reservations</a> -->
			<a href="viewreservation.php" class="btn btn-danger mt-5">Cancel reservation</a>
			</div>
			<!--start php-->
				<?php

					$sql = new Table;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$firstname = strip_tags(trim($_POST['fname']));
	$lastname = strip_tags(trim($_POST['lname']));
	$phone = strip_tags(trim($_POST['phone']));
	$email = strip_tags(trim($_POST['email']));
	$guest = strip_tags(trim($_POST['guest']));   
	$reservetype = strip_tags(trim($_POST['types']));
	$reservedate =strip_tags(trim($_POST['dates']));
	$reservetime = strip_tags(trim($_POST['time']));
	$reservedspecial = strip_tags(trim($_POST['special']));

	//validate
	$error = [];
	if(empty($firstname)){
		$error[] = 'First name field cannot be empty';
	}
	if(empty($lastname)){
		$error[] = 'Last name field cannot be empty';
	}
	if(empty($phone)){
		$error[]='Please input your phone number';
	}
	if(empty($email)){
		$error[]='Please email field is empty';
	}
	if(empty($guest)){
		$error[]='Please input number of people';
	}
	
	if(empty($reservedate)){
		$error[]='Please date field is empty';
	}
	if(empty($reservetime)){
		$error[]='Please time field is empty';
	}
	if(empty($reservetype)){
		$error[]='Please type field is empty';
	}


	if(!empty($error)){
		echo "<ul class='alert alert-danger'>";
		foreach ($error as $key => $value) {
			echo "<li>$value</li>" ;	
		}
		echo "</ul>";
	}else{
		$result = $sql->ckeckEmailAddress($email);
		if($result == true){
			echo " <span class='text-danger'>Email already exist</span>";
		}
		else{
			$output = $sql->inserttable($firstname, $lastname, $phone, $email,$guest,$reservetype, $reservedate, $reservetime,$reservedspecial, $id);

			echo $output;
			
			echo "<span class='alert alert-danger text-center'>Table has been reserved. Hurray!!!</span>";
		}

	}
}?>

			<!--start php-->
			<div class="card mt-3">
				
				<div class="card-header">	
				</div>
				<div class="card-body">
					<form action="" method="post">
						<input type="text" name="fname" class="form-control mb-2" placeholder="First name">
						<input type="text" name="lname" class="form-control mb-2" placeholder="Last name">
						<input type="text" name="phone" class="form-control mb-2" placeholder="Phone number">
						<input type="email" name="email" class="form-control mb-2" placeholder="email">
						<input type="text" name="guest" class="form-control mb-2" placeholder="Number of guest">
						<input type="text" name="types" class="form-control mb-2" placeholder="Enter the type of table reservation e.g dinner, VIP,wedding" >
						<input type="date" class="form-control mb-2" name="dates" placeholder="Enter the reserved date">
						<input type="time" class="form-control mb-2" name="time" placeholder="Enter the reserved date">
						<label>Any special request</label>
						<textarea class="form-control mb-4" name="special"></textarea>
						<!-- <select name="status" class="form-control">
							<option name='status'>New</option>
							<option name='status'>Cancelled</option>
						</select> -->
						<input type="submit" class="form-control mb-4 text-light" name="submit" style="background-color: #e8a392;">
						
					</form>
				</div>
			</div>	
		</div>
		<div class="col-md-3">

		</div>
		</div>
	</div>	
</div>
<script type="text/javascript" src="js/jquery.min.js">	
	</script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

