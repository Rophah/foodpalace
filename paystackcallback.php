<?php
// var_dump($_REQUEST);
include_once("functionnavbar.php");
include_once("classes/tablereservation.php");

if (isset($_SESSION['myid'])) {
    $myid=$_SESSION['myid'];
  }

$sql = new Table;
$result = $sql->deleteall($myid);


$fp = curl_init();

//Turn off SSL
curl_setopt($fp, CURLOPT_SSL_VERIFYPEER,false);

//Get the reference code for the URL
if(!empty($_GET["reference"])){
	//clean reference code

	$sanitize = filter_var_array($_GET,FILTER_SANITIZE_STRING);
	$reference = rawurldecode($sanitize["reference"]);
	//var_dump($reference);
}else{
	die("No reference was supplied");
}

//Set the configuration
curl_setopt_array($fp, array(
	CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
	CURLOPT_RETURNTRANSFER=> true,

	//set the headers
	CURLOPT_HTTPHEADER=>[
		"accept:application/json",
		"authorization: Bearer sk_test_69520e61c410b160d867ff23b79c839122387d6d",
		"cache-control:no-cache"
	]
)
);

//Execute cURL
$response = curl_exec($fp);

$err = curl_error($fp);
if($err){
	die("cURL returned some errors: ".$err);
}

//var_dump($response);
$tranx = json_decode($response);
//var_dump($tranx);

if(!$tranx->status){
	die("API returned some error: ".$tranx->message);
}
if('success' == $tranx->data->status){
	$amount = $tranx->data->amount;
	//var_dump($amount);
	$email = $tranx->data->customer->email;
	$ref = $tranx->data->reference;
	$currency = $tranx->data->currency;
	
}else{
	die("Transaction not found!");
}

?>


	<div class="container-fluid text-center">
		<div class="row" style="background-color: #e8a392; color:#fff">
		<h1 class="mt-4 mb-3" >Verification Page </h1>
		</div>
		<div class="product mt-5">
			<h3>See the details of your purchase!</h3>
			<p>Customer email: <?php echo $email?></p>
			<p>Reference: <?php echo $ref ?></p>
			<!-- <p>Product name: <?php //echo $product_name ?></p>
			<p>Product description: <?php //echo $product_desc ?></p> -->
			<p>Amount: <?php echo $currency.$amount/100 ?></p>
			<h2>Please check your email for your receipt.</h2>
			<h2>Thank you for patronizing us. Have a great day.</h2>
		</div>
	</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>