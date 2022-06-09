<?php
include_once("adminnavbar.php");
include_once("classes/adminuser.php");


$sql = new Admin;
$result = $sql->allcustomer();

?>

<body class="ground">
	
<div class="container">
	<div class="row ">

		<?php include_once("adminsidenav.php");?>
		<div class="col-md-7">
			<div class="text-center">
				<div class="bg-light mb-4 mt-4" style="color:red; font: 2rem bold;"><h1 class="mb-4 mt-4"><i class="fa fa-users" style='font-size:24px'></i> Registered customers</h1>
				<hr></div>
			</div>

			<table class="table table-light mt-5" style="border-radius: 4px;">
				<thead class="mt-2" >
					<tr>
					<th scope="col">#</th>
					<th scope="col">Full name</th>
					<th scope="col">Phone number</th>
					<th scope="col">Email address</th>
					</tr>
				</thead>
				<tbody class="mt-2 ">
					<?php 
					$counter = 1;
					foreach ($result as $key => $value) {
					?>
					<tr>
						<th><?php echo $counter++?> </th>
						<td><?php echo $value['FULL NAME']?> </td>
						<td><?php echo $value['PHONE NUMBER']?></td>
						<td><?php echo $value['EMAIL ADDRESS']?></td>
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