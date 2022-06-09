<?php
//session_start();
include_once("adminnavbar.php");
include_once("classes/fooduser.php");
include_once("classes/adminuser.php");

$cus = new Admin;
$result = $cus->customernumber();

$table = $cus->viewtable();

$order = new Food;
$countorder = $order->countallorder();

$sumfood = $order->sumamountorder();
?>

<body class="ground">
<div class="container">
	<div class="row mt-3">

		<?php include_once("adminsidenav.php");?>
		<div class="col-md-1"></div> 
		<div class="col-md-3">
			<div class="col mb-5 mt-5">
				<div class="card text-white bg-primary">
					<div class="card-header text-center fs-5 mt-3"><i class="fa fa-users" style='font-size:24px'></i> Number of customers</div>
					<div class="card-body">
						<p class="card-text text-center mt-1"><?php 
              foreach ($result as $key => $value) {
                echo $value;
                }

            ?></p>
						<a href="adminviewcustomer.php" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>
		<div class="col mb-5 mt-5">
				<div class="card text-white bg-warning h-100">
					<div class="card-header text-center fs-5 mt-3"><i class="fa fa-list"></i> Amount received</div>
					<div class="card-body">
						<p class="card-text text-center mt-1">#<?php 
              foreach ($sumfood as $key => $value) {
                echo $value;
                }

            ?></p>
						<a href="#" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
		    <div class="col mb-5 mt-5">
				<div class="card text-white bg-info h-100">
					<div class="card-header text-center fs-5 mt-1">Number of reserved table</div>
					<div class="card-body">
						<p class="card-text text-center mt-1"><?php 
              foreach ($table as $key => $value) {
                echo $value;
                }

            ?></p>
						<a href="listtablepreserve.php" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>
			<div class="col mb-5 mt-5">
				<div class="card text-white bg-success h-100">
					<div class="card-header text-center fs-5 mt-3">Number of order</div>
					<div class="card-body">
						<p class="card-text text-center mt-1"><?php 
				              foreach ($countorder as $key => $value) {
				                echo $value;
				                }

				            ?></p>
						<a href="orderdetails.php" class="fs-5 mt-3 text-white">VIEW DETAILS</a>
					</div>
				</div>
			</div>	
		<!-- start here -->

		   
	</div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>