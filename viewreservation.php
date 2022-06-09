<?php
include_once("classes/tablereservation.php");
include_once("functionnavbar.php");
//session_start();
if(isset($_SESSION['myid'])){
	$myid = $_SESSION['myid'];
}

$tab = new Table;
$result= $tab->selecttablepreservation($myid);

// echo "<pre>";
// print_r($result);
// echo "</pre>";

?>
<div class="row text-center mb-5" style="background-color: #e8a392; color:#fff">
		<h1 class="mt-4 mb-4" >View reserved table</h1>
</div>
<div class="container">
	<div class="row text-center">
		<div class="">
			
		</div>

		<table class="table table-striped table-primary">
			<thead>
			<tr>
				<th>#</th>
				<th>First name</th>
				<th>Surname</th>
				<th>Phone number</th>
				<th>Email address</th>
				<th>Number of guest(s)</th>
				<th>Reservation type</th>
				<th>Reserved date</th>
				<th>Reserved time</th>
				<th>Special request</th>
				<th colspan='2'>Action</th>
				
			</tr>			
			</thead>
			<tbody>
				<?php 
				$counter = 1;
				foreach($result as $value)
					
				{
					?>
					<tr>
						<th><?php echo $counter++ ;?></th>
						<td><?php echo $value['firstname']?></td>
						<td><?php echo $value['lastname']?></td>
						<td><?php echo $value['phone'] ?></td>
						<td><?php echo $value['email']?></td>
						<td><?php echo $value['guest']?></td>
						<td><?php echo $value['types']?></td>
						<td><?php echo $value['reservedate']?></td>
						<td><?php echo $value['reservetime']?></td>
						<td><?php echo $value['specialrequest']?></td>

						<!-- <td><a href="editreservation.php" class="btn btn-primary">Edit</a></td> -->
						<td><button class="btn btn-danger" onclick="deletereserve(<?php echo $value['idtablereservation']?>)">Cancel reservation</button></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	function deletereserve($del){
		if(confirm("Are you sure you want to cancel your reservation?")){
			window.location.href = "cancelreservation.php?del=" + $del + '';
		}
	}
</script>
