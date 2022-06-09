<?php


$foodstring = $_REQUEST['search'];
//var_dump($foodstring);

if(!empty($foodstring)){
	include_once("classes/fooduser.php");
	$sql = new Food;

	$result = $sql->searchstring($foodstring);

	// echo "<pre>";
	// print_r($result);
	// echo "</pre>";

	if(count($result) > 0){
		foreach ($result as $key => $value) {
	?>
		<div class="clearfix" style="padding:0.5rem; ">
			<img src="foodimages/<?php echo $value['foodimage']?>" style="width: 45px; float: left margin-left:10px;">
			<?php echo $value['foodtitle']?>
		</div>
	<?php		
		}
	}
	if($result == false){
		echo "This food is not available";
	}

}else{
		echo "Type in to check list of available food";
	
}
?>