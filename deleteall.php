<?php
ob_start();
include_once('classes/tablereservation.php');
include_once('cart.php');
//include_once('adminnavbar.php');

if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }

$sql = new Table;
$res = $sql->deleteall($myid);

header("Location:cart.php");
ob_flush();

?>