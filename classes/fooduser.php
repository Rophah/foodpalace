
<?php
include_once('constants.php');
class Food{

	public $firstname;
	public $lastname;
	public $email;
	public $phone;
	public $dbconnect;

	public function __construct(){
		$this->dbconnect=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if ($this->dbconnect->connect_error){
			die("Connection error: ".$this->dbconnect->connect_error);
		}
	}
	//end of db connect

	public function insertCategory($category_type){

		$category_image = $this->categoryuploadFile();

		if($category_image != false){
			$sql = "INSERT INTO category SET category_type='$category_type' , category_image= '$category_image' ";

			
			$result = $this->dbconnect->query($sql);

			if($this->dbconnect->affected_rows == 1){
				return true;
			}else{
				return false;
			}
		}
	}

	//begin upload file
		public function categoryuploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['category_image']['name']; //original file name

	$filesize = $_FILES['category_image']['size'];//size

	$tmp_name = $_FILES['category_image']['tmp_name']; //temporary file

	$filetype = $_FILES['category_image']['type']; //mime type

	$error = $_FILES['category_image']['error'];

	//check if file uploaded
	//var_dump($filename);
	//var_dump($tmp_name);
	//exit;

	if($error > 0){
		die("No file uploaded!");
	}

	//check file size
	if ($filesize > 2097152){
		die("File should not be more than 2mb");
	}

	$extension = array('jpg','png','jpeg','gif','svg');

	//get the uploaded file extension

	$file_ext = explode("." , $filename);
	
	$the_file_ext = end($file_ext);
	//var_dump($the_file_ext);

	//check if the file extension is allowed

	if(!in_array(strtolower($the_file_ext), $extension)){
		die("File type not allowed!");
	}

	//destination folder  

	$folder = "foodimages/";
	$new_filename = rand().time().".".$the_file_ext;
	$destination = $folder.$new_filename;

	//move the file from temporary to destination

	if(move_uploaded_file(($tmp_name), $destination)){
		return $new_filename;
	}else{
		return false;
	}


		}
	//end upload file

	public function category(){
		$sql = "SELECT * FROM category";
		$result= $this->dbconnect->query($sql);
		// var_dump($sql);
		// exit;
			$record = [];
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}

	}

	//display on index page food in each category
	public function categoryindexpage(){
		$sql = "SELECT * FROM category join food where category.idcategory = food.idfood";
		$result= $this->dbconnect->query($sql);
		// var_dump($sql);
		// exit;
			$record = [];
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}
	//end display on index page food in each category

	public function addproduct($foodtitle,$fooddescription,$foodprice,$idcategory){

		$emblem= $this->uploadfile();

		if ($emblem != false){

			$sql = "INSERT INTO food SET foodtitle = '$foodtitle',fooddescription = '$fooddescription',foodprice ='$foodprice', foodimage='$emblem' , idcategory ='$idcategory'";		
			
			$result = $this->dbconnect->query($sql);

			//var_dump($result);
			if($this->dbconnect->error){
				die("Error in connection: ".$this->dbconnect->error);
			}

			if($this->dbconnect->affected_rows == 1){
				//return true;
				//return "<span class='alert alert-success mt-3 mb-3'>Product was successfully added to the database</span>";
			}else{
				return "Oops! something happened try again later!";
			}
		}
	}


	//begin upload file
		public function uploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['foodimage']['name']; //original file name

	$filesize = $_FILES['foodimage']['size'];//size

	$tmp_name = $_FILES['foodimage']['tmp_name']; //temporary file

	$filetype = $_FILES['foodimage']['type']; //mime type

	$error = $_FILES['foodimage']['error'];

	//check if file uploaded
	//var_dump($filename);
	//var_dump($tmp_name);
	//exit;

	if($error > 0){
		die("No file uploaded!");
	}

	//check file size
	if ($filesize > 2097152){
		die("File should not be more than 2mb");
	}

	$extension = array('jpg','png','jpeg','gif','svg');

	//get the uploaded file extension

	$file_ext = explode("." , $filename);
	
	$the_file_ext = end($file_ext);
	//var_dump($the_file_ext);

	//check if the file extension is allowed

	if(!in_array(strtolower($the_file_ext), $extension)){
		die("File type not allowed!");
	}

	//destination folder  

	$folder = "foodimages/";
	$new_filename = rand().time().".".$the_file_ext;
	$destination = $folder.$new_filename;

	//move the file from temporary to destination

	if(move_uploaded_file(($tmp_name), $destination)){
		return $new_filename;
	}else{
		return false;
	}


		}
	//end upload file

	//function to list food on the table
	function getFood(){
		$sql = "SELECT * FROM food JOIN category WHERE food.idcategory = category.idcategory";

		
		$result = $this->dbconnect->query($sql);
		
		$records = [];

		if($result->num_rows >0){
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}return $records;
		}else{
			return $records;
		}
	}	
	//end function to list food on the table	

	//
	public function findFood($idfood){
		$sql= "SELECT * FROM food WHERE idfood = $idfood";

		$result = $this->dbconnect->query($sql);
		//var_dump($result);
		if($this->dbconnect->affected_rows == 1){
			$row =$result->fetch_assoc();
			return $row;
		}else{
			return false;
		}

	}
	//end of food
	//edit product
	public function updateFood($foodtitle,$fooddescription,$foodprice,$foodimage,$idcategory){

			//call upload file function
			if(isset($_FILES['error']) && $_FILES['error'] == 0){
				$emblem = $this->uploadFile();
			}else{
				$emblem = $foodimage;
			}
			
			$emblem = $this->uploadFile(); 
			if ($emblem != false){

				$sql = "UPDATE food SET  foodtitle= '$foodtitle', fooddescription='$fooddescription',
				foodprice = '$foodprice' , foodimage='$emblem', idcategory='$idcategory' WHERE idfood ='$idcategory'";

				//run the query
				//var_dump($sql);

				$result = $this->dbconnect->query($sql);

				//var_dump($result);
				if($this->dbconnect->affected_rows == 1 || $this->dbconnect->affected_rows == 0){
					return true;
				}else{
					return false;
				}
			}
		}
	//end edit product 
	public function adminlogout(){
		session_start();

		session_destroy();

		header('Location: index.php');
	}

	public function localdish(){
		$sql = "SELECT * FROM food WHERE idcategory = 1";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}

	public function intercontinental(){
		$sql = "SELECT * FROM food WHERE idcategory = 2";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}

	public function snacks(){
		$sql = "SELECT * FROM food WHERE idcategory = 3";

		$result = $this->dbconnect->query($sql);
		
		$record = [];

		if($this->dbconnect->affected_rows > 0){

			while( $row = $result->fetch_assoc()){
				$record[] = $row;
			}return $record;
		}else{
			return $record;
		}
	}
	//end of get snacks
	
	//search for food
	public function searchforfood($searchfood){
		$sql = "SELECT * FROM food";

		$result = $this->dbconnect->query($sql);

		$row = [];
		if($this->dbconnect->affected_rows >0){
			while($rec = $result->fetch_assoc()){
				$row[] = $rec;
			}return $row;
		}else{
			return $row;
		}
	}

	
	function addcart($idcustomer,$idfood,$quantity){
		//write query

		$sql = "INSERT INTO cart SET idcustomer='$idcustomer', idfood = '$idfood', quantity='$quantity'";


		$result = $this->dbconnect->query($sql);
		
		if($this->dbconnect->affected_rows == 1){
			return true;
			//return $result;
		}else{
			return false;
		}

	}

	
	public function selectallfromcart($id){
		$sql = "SELECT * FROM cart JOIN food ON cart.idfood=food.idfood WHERE idcustomer= '$id' && status = 'pending'";

		$result = $this->dbconnect->query($sql);
		
		$row = [];
		if($this->dbconnect->affected_rows > 0){
			while($rec= $result->fetch_assoc()){
				$row[] = $rec;
			}return $row;
		}else{
			return $row;
		}

	}
	
	function getAllEmail($id){
		$sql = "SELECT * FROM user WHERE idcustomer= '$id'";
		$result = $this->dbconnect->query($sql);

		if($this->dbconnect->affected_rows > 0){
			$rows = $result->fetch_assoc();
			$email = $rows['emailaddress'];
			return $email;
		}else{
			return false;
		}
	}

	//begin initialize paystack transaction
		public function initializePaystack($amount,$email,$reference){

			$url = "https://api.paystack.co/transaction/initialize";
			$callbackurl = "http://localhost/onlineordering/paystackcallback.php";

			$fields = [
					'email' => $email,
					'amount' => $amount * 100,
					'reference' => $reference,
					'callback_url' => $callbackurl
				];

			$fields_string = http_build_query($fields);

			//step 1: open connection
			$fp= curl_init();

			//step 2: set curl options
			//set the url, number of POST vars, POST data
			  curl_setopt($fp,CURLOPT_URL, $url);
			  curl_setopt($fp,CURLOPT_POST, true);
			  curl_setopt($fp,CURLOPT_POSTFIELDS, $fields_string);
			  curl_setopt($fp, CURLOPT_HTTPHEADER, array(
			    "Authorization: Bearer sk_test_69520e61c410b160d867ff23b79c839122387d6d",
			    "Cache-Control: no-cache",
			));
			  curl_setopt($fp, CURLOPT_SSL_VERIFYPEER, false);
			  curl_setopt($fp, CURLOPT_RETURNTRANSFER, true);

			  //step 3: execute the curl session

				$result= curl_exec($fp);

				//check if there is error

				if(curl_error($fp)){
					var_dump(curl_error($fp));
				}

				//step 4: close curl session

				curl_close($fp);

				//step 5: convert json to array
				$response = json_decode($result, true);
				return $response;
		}
	//end initialize paystack transaction
	
	//begin insert transaction details
		public function insertTransDetails($amount, $productid, $userid, $transref){

				$sql = "INSERT INTO payment SET transactionamount = '$amount', idfood='$productid',
				idcustomer = '$userid' , transactionstatus='pending', trans_reference = '$transref'";

				//run the query
				var_dump($sql);

				$result = $this->dbconnect->query($sql);
				var_dump($result);
				if($this->dbconnect->affected_rows == 1){
					return true;
				}else{
					return false;
				}
			
		}

	//end transaction details

		//begin insert order details
		public function orderDetails($amount, $productid, $userid, $quantity, $totalamount){

				$sql = "INSERT INTO orderdetails SET price = '$amount', idfood='$productid',
				idcustomer = '$userid' , quantity='$quantity', orderdetailtotalamount = '$totalamount'";

				//run the query
				$result = $this->dbconnect->query($sql);
				
				
				if($this->dbconnect->affected_rows > 0){
					
					return $result;
				}else{
					return false;
				}
			
		}

	//end transaction details


		//search for food function
		public function searchstring($searchfood){
		$sql = "SELECT * FROM food WHERE foodtitle LIKE '%$searchfood%'";

		$result = $this->dbconnect->query($sql);

		$row = [];
		if($this->dbconnect->affected_rows >0){
			while($rec = $result->fetch_assoc()){
				$row[] = $rec;
			}return $row;
		}else{
			return $row;
		}
	}

	public function selectallorder(){
		$sql = "SELECT * FROM orderdetails JOIN user WHERE orderdetails.idcustomer = user.idcustomer";

		$result = $this->dbconnect->query($sql);

		$row = [];
		if($this->dbconnect->affected_rows >0){
			while($rec = $result->fetch_assoc()){
				$row[] = $rec;
			}return $row;
		}else{
			return $row;
		}
	}

	public function countallorder(){
		$sql = "SELECT COUNT(idorder) from orderdetails";

		$result = $this->dbconnect->query($sql);

		if($this->dbconnect->affected_rows > 0){
			$row = $result->fetch_assoc();

			return $row;
		}else{
			return false;
		}
	}

	public function sumamountorder(){
		$sql = "SELECT SUM(orderdetailtotalamount) from orderdetails";

		$result = $this->dbconnect->query($sql);

		if($this->dbconnect->affected_rows > 0){
			$row = $result->fetch_assoc();

			return $row;
		}else{
			return false;
		}
	}

	public function deleteorder($id){
	
		$sql = "DELETE FROM orderdetails WHERE idorder ='$id' ";
		$result = $this->dbconnect->query($sql);
		// var_dump($result);
		// die;
		if($this->dbconnect->affected_rows > 0){
			return true;
		}else{
			return false;
		}
	}

}
?>
