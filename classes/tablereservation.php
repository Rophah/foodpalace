<?php

include_once('constants.php');

class Table{

	public $dbcon;

	public function __construct(){
		$this->dbcon = new Mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if($this->dbcon->connect_error){
			die('Connection error'.$this->dbcon->connect_error);
		}
	}

	public function inserttable($fname,$lname,$phone,$email,$guest,$type,$date,$time,$specialrequest,$idcustomer){
		$sql = "INSERT INTO tablereservation(firstname,lastname,phone,email,guest,types,reservedate,reservetime,specialrequest,idcustomer) VALUES('$fname','$lname','$phone','$email','$guest','$type','$date','$time','$specialrequest','$idcustomer')";

		$result =$this->dbcon->query($sql);
		// var_dump($result);
		// exit;
		if($this->dbcon->affected_rows ==1){
			return true;
		}else{
			return false;
		}
	}


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

	//list table preserved
	public function listreserve(){
		$sql = "SELECT * FROM tablereservation";

		$result = $this->dbcon->query($sql);

		$row=[];
		if($this->dbcon->affected_rows > 0){
			while ( $res = $result->fetch_assoc()) {
				$row[] = $res;
			}return $row;
		}else{
			return $row;
		}
	}

	//find table reserved at $idtablereserve

	public function findtablereserve($id){
		$sql = "SELECT * FROM tablereservation WHERE idtablereservation = $id";

		$result = $this->dbcon->query($sql);

		$row = [];
		if($this->dbcon->affected_rows > 0){
			while($res = $result->fetch_assoc()){
				$row[] = $res;
			}return $row;
		}else{
			return $row;
		}
	}

	public function updateTable($firstname,$lastname,$phone,$email,$guest, $types,$reservedate,$reservetime,$specialrequest,$status, $idtablereservation){
		$sql = "UPDATE tablereservation SET firstname ='$firstname',lastname = '$lastname', phone= '$phone',email='$email', guest='$guest', types = '$types', reservedate='$reservedate', reservetime='$reservetime',specialrequest = '$specialrequest', status='$status' WHERE idtablereservation = $idtablereservation";
		$result = $this->dbcon->query($sql);
		//var_dump($result);
		//exit;
		if($this->dbcon->affected_rows == 1){
			return $result;
		}else{
			return $result;
		}
	}
	
	public function deletetry($id){
		$sql = "DELETE FROM cart WHERE cart_id = '$id'";
		$result = $this->dbcon->query($sql);
		if($this->dbcon->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		//$sql = "DELETE FROM cart WHERE cart_id = '".$_GET['del_id']."'";

		$sql = "DELETE FROM cart WHERE cart_id ='$id' ";
		$result = $this->dbcon->query($sql);
		// var_dump($result);
		// die;
		if($this->dbcon->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

	

	public function deleteall($id){

		$sql = "DELETE FROM cart WHERE idcustomer ='$id' ";
		$result = $this->dbcon->query($sql);
		// var_dump($result);
		// die;
		if($this->dbcon->affected_rows > 0){
			return true;
		}else{
			return false;
		}
	}

	function cartsumup($userid){
		$sql = "SELECT sum(foodprice*quantity) AS totalprice FROM cart JOIN food on cart.idfood=food.idfood WHERE idcustomer='$userid' AND status='pending'";

		$result = $this->dbcon->query($sql);

		//var_dump($result);
		if($this->dbcon->affected_rows > 0){
			$row = $result->fetch_assoc();
			$total= $row['totalprice'];
			return $total;
		}else{
			return $total;
		}
	}

	function selecttablepreservation($id){
		$sql= "SELECT * FROM tablereservation WHERE idcustomer = '$id'";

		$result = $this->dbcon->query($sql);
		$row = [];
		if($this->dbcon->affected_rows > 0 ){
			while($rec = $result->fetch_assoc()){
				$row[] = $rec;
			}
			return $row;
		}else{
			return $row;
		}
	}

	public function deletereserved($id){
		$sql = "DELETE FROM tablereservation WHERE idtablereservation = '$id'";
		$result = $this->dbcon->query($sql);
		if($this->dbcon->affected_rows == 1){
			return true;
		}else{
			return false;
		}
	}

}
?>