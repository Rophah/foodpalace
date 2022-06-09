<?php
include_once("constants.php");

class Admin {

	public $dbcon;

	public function __construct(){
		$this->dbcon = new Mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if($this->dbcon->connect_error){
			die('Connection error');
		}
	}

	
		//begin add club
		public function signup($fname,$lname,$email,$dateofbirth,$phonenumber,$password){

			$emblem = $this->uploadFile();
			if ($emblem != false){

				$password = password_hash($password,PASSWORD_DEFAULT);
				$sql= "INSERT INTO admin SET fname='$fname',lname='$lname',email='$email',dateofbirth= '$dateofbirth',phonenumber = '$phonenumber',adminpicture='$emblem',password='$password'";


				//run the query
				$result = $this->dbcon->query($sql);

				if($this->dbcon->affected_rows == 1){
					session_start();
					$_SESSION['email']=$email;
					$_SESSION['orptiyek'] = "adminonlineordering";
					return true;
				}else{
					return false;
				}

			}
		}

	//end add club

		//check email
		public function ckeckEmailAddress($email){
		$sql = "SELECT * FROM admin WHERE email = '$email'";

		$result = $this->dbcon->query($sql);
		if($this->dbcon->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

	//begin upload file
		public function uploadFile(){
			//create variables to access the uploaded file data

	$filename = $_FILES['emblem']['name']; //original file name

	$filesize = $_FILES['emblem']['size'];//size

	$tmp_name = $_FILES['emblem']['tmp_name']; //temporary file

	$filetype = $_FILES['emblem']['type']; //mime type

	$error = $_FILES['emblem']['error'];

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

	$folder = "uploads/";
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

	//login admin
	public function login($email,$password){
		
		$sql = "SELECT * FROM admin WHERE email = '$email'";

		$result = $this->dbcon->query($sql);

		if($this->dbcon->error){
			return "Oops there is a connection error";
		}

		if($this->dbcon->affected_rows == 1){
			$rows= $result->fetch_assoc();
			$confirm=password_verify($password, $rows['password']);

			if($confirm){
				session_start();
				$_SESSION['mylogchecker'] = "Rt_0_0_0)_rab";
				$_SESSION['email'] = $rows['email'];
				$_SESSION['fname'] = $rows['fname'];
			}
			return $rows;
		} else{
			return false;
		}				
	}

	public function customernumber(){
		$sql = "SELECT COUNT(idcustomer) from user";

		$result = $this->dbcon->query($sql);

		if($this->dbcon->affected_rows > 0){
			$row = $result->fetch_assoc();

			return $row;
		}else{
			return false;
		}
	}

	public function allcustomer(){
		$sql= "SELECT CONCAT_WS(', ', lastname, firstname) AS  'FULL NAME' ,phonenumber AS 'PHONE NUMBER', emailaddress AS 'EMAIL ADDRESS' FROM user ORDER BY 'FULL NAME'";

		$result = $this->dbcon->query($sql);
		$rows = [];
		if($this->dbcon->affected_rows > 0){
			while($rec = $result->fetch_assoc()){
				$rows[] = $rec;
			}
			return $rows;
		}else{
			return false;
		}
	}

	public function viewtable(){
		$sql ="SELECT count(idtablereservation) FROM tablereservation";

		$result= $this->dbcon->query($sql);
		if($this->dbcon->affected_rows > 0){
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}
	
}

?>