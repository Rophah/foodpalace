<?php
include_once("adminnavbar.php");
include_once("classes/tablereservation.php");
$sql = new Table;

$id = $_GET['delid'];
$result = $sql->delete($id);


header("Location:cart.php");



?>