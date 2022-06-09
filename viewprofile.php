<?php
include_once("functionnavbar.php");
include_once("classes/useredit.php");
?>

<body class="ground">
	<div class="text-center">
		<h2><i class="fa-solid fa-user mt-5 "></i>My Profile</h2>	
	</div>
	
<div class="container " >
	<div class="row mb-5 mt-5 d-flex justify-content-center" >	
			<?php
				if (!empty($_SESSION['myid'])){       
          			$userid=$_SESSION['myid'];
          
      			} 

				$newobj = new User;
				$finduser = $newobj->finduser($userid);

			?>
		
		<div class="col-md-3">
			<div class="card  mb-4" style="width: 18rem; border-radius: 5px;">
				<div class="card-body text-primary 
				">
					<div class="card-title">Name</div>
						<div class="card-text">First name: <?php echo $finduser[0]['firstname'];?></div>
						<div class="card-text">Last name: <?php echo $finduser[0]['lastname'];?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card  mb-4" style="width: 18rem; border-radius: 5px;">
				<div class="card-body text-primary 
				">
					<div class="card-title"><i class="fa-solid fa-envelope" style="color: red"></i>Email address</div>
						<div class="card-text"><?php echo $finduser[0]['emailaddress'];?></div>
						
				</div>
			</div>
		</div>
	</div>

	<div class="row d-flex justify-content-center">
		<div class="col-md-3">
			<div class="card mb-4" style="width:20rem; border-radius: 5px;">
				<div class="card-body text-primary 
				">
				<div class="card-title"><i class="fa-solid fa-address-card" style="color:red;"></i>Contact Me</div>
				<div class="card-text">Phone number: <?php echo $finduser[0]['phonenumber'];?></div>	
			</div>
		</div>	
	</div>

	<div class="row mb-5">
		<div class="card text-center">
			<div class="card-title mb-4 mt-4" style="color:red; font: 2rem bold;">How to order for food
				<hr></div>
			<div class="card-body">
				<p>* Check for your deliciously made meal under category or menu</p>
				<p>* Click on button to select the number of plates of the desired food you want</p>
				<p>* Click add to cart</p>
				<p>* In cart, delete food you don't want otherwise, click on pay</p>
				<p>* Pay with your credit card</p>
				<p>* Thank you for doing business with us 🎊</p>

			</div>

		</div>
	</div>
</div>		
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>