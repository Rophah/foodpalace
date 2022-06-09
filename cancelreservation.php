<?php
include_once "classes/tablereservation.php";

$id = $_GET['del'];
$sql = new Table;
$result= $sql->deletereserved($id);

header("Location: viewreservation.php");

?>