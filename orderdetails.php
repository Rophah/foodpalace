<?php
include_once('classes/fooduser.php');
include_once('adminnavbar.php');
include_once('classes/tablereservation.php');

if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }
$obj = new Food;
$result = $obj->selectallorder();

?>

<body class="ground">
	
<div class="container">
	<div class="row ">

		<?php include_once("adminsidenav.php");?>
		<div class="col-md-9">
			<div class="text-center">
				<div class="bg-light mb-4 mt-4" style="color:red; font: 2rem bold;"><h1 class="mb-4 mt-4"><i class="fa fa-users" style='font-size:24px'></i> All orders</h1>
				<hr></div>
			</div>

			<table class="table table-light mt-5" style="border-radius: 4px;">
				<thead class="mt-2" >
					<tr>
					<th scope="col">#</th>
					<th scope="col">First name</th>
					<th scope="col">Last name</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total amount</th>
					<th scope="col">Order date</th>
					</tr>
				</thead>
				<tbody class="mt-2 ">
					<?php 
					$counter = 1;
					foreach ($result as $key => $value) {
					?>
					<tr>
						<th><?php echo $counter++?> </th>
						<td><?php echo $value['firstname']?> </td>
						<td><?php echo $value['lastname']?></td>
						<td><?php echo $value['price']?></td>
						<td><?php echo $value['quantity']?></td>
						<td><?php echo $value['orderdetailtotalamount']?></td>
						<td><?php echo $value['orderdetaildate']?></td>
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