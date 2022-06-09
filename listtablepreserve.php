<?php 

include_once('classes/tablereservation.php');
include_once("adminnavbar.php");

$sql = new Table;
$result = $sql->listreserve();
// echo "<pre>";
// print_r($result);
// echo "<pre>";
?>
<body class="ground">
<div class="container-fluid">
	<div class="row text-center" style="background-color: #e8a392; color:#fff">
	<h2 class="mt-5">List of table reserved</h2>
	</div>
	<div class="row mb-5">
		<?php include_once("adminsidenav.php");?>
	</div>
	<div class="row mt-3">

		

		

		<div class="col">
		<table class="table table-striped ">
			<thead class="table-dark">
				<tr>
					<th>#</th>
					
					<th>First name</th>
					<th>Last name</th>
					<th>Phone number</th>
					<th>Email address</th>
					<th>Number of guests</th>
					<th>Type of reservation</th>
					<th>Reserve date</th>
					<th>Reserve time</th>
					<th>Special request</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
					<?php
					$counter = 1;
					foreach ($result as $key => $value) {
						$id = $value['idtablereservation'];
					?>
					<tr>
					<th><?php echo $counter++?></th>
					<!--  -->
					<th><?php echo $value['firstname']?></th>
					<th><?php echo $value['lastname']?></th>
					<th><?php echo $value['phone']?></th>
					<th><?php echo $value['email']?></th>
					<th><?php echo $value['guest']?></th>
					<th><?php echo $value['types']?></th>
					<th><?php echo $value['reservedate']?></th>
					<th><?php echo $value['reservetime']?></th>
					<th><?php echo $value['specialrequest']?></th>
					<th><?php echo $value['status']?></th>
					<th><a href="admineditreserve2.php?id=<?php echo $id; ?>" class='btn-primary btn-sm mb-2'>Edit</a></th>
					</tr>
					<?php
					}

					?>
				
			</tbody>
		</table>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>