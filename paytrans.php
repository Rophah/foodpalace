<?php

include_once('classes/fooduser.php');


if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }

$obj = new Food;
$result = $obj->insertTransDetails($_POST['price'],$_POST['idfood'],$_POST['userid'],$_POST['transref']);

$output = $obj->initializePaystack($_POST['price'], $_POST['email'], $_POST['transref']);

// var_dump($output);

$redirecturl = $output['data']['authorization_url'];

header("Location: $redirecturl");
exit;
?>

