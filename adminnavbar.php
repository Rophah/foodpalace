<?php
session_start();
include_once("classes/adminuser.php");

if(isset($_SESSION['mylogchecker']) && ($_SESSION['mylogchecker'] = "Rt_0_0_0)_rab") && $_SESSION['email']){
  
}else{
  header("Location: adminlogin.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta name="keywords" content="order food, reserve table, local food, snacks, amala">
  <meta name="description" content="An restaurant online website to order local and intercontinental dishes and reserve a table">
  <meta name="author" content="Adebanjo Rofah">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=width-device,initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> 
   <link href="main.css" rel="stylesheet" type="text/css">
  <link href="css/all.css" rel="stylesheet" type="text/css">
  <link href="font.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #searchresult{
      position: absolute;
      background-color: #fff;
    }
  </style>
  <title>Food Palace: Order your food</title>
</head>

<div class="container-fluid" style="font-size: 1.2rem; background-color: white;">
  <div class="row">
    
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid" >
    <a class="navbar-brand" href="admindashboard.php"><i class="fa-duotone fa-bowl-hot"></i>f<span style="color:red">OO</span>D pALACE</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img class="menuimg" src="images/menu.png" alt="menu">
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admindashboard.php"><i class="fa-solid fa-house" style='color:red'></i>Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ALL ABOUT FOOD
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="addproduct.php">Add new dish</a></li>
            <li><a class="dropdown-item" href="listfood.php">View all dishes</a></li>
             <li><a class="dropdown-item" href="insertcategory.php">Insert new category of food</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listtablepreserve.php"> VIEW ALL TABLE RESERVED</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminviewcustomer.php"> VIEW ALL CUSTOMERS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">WELCOME <?php echo $_SESSION['fname']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="adminlogin.php"><i class="fa-solid fa-right-to-bracket" style='color:red; margin-top: 3px;'></i>Login</a></li>
            <li><a class="dropdown-item" href="adminsignup.php"><i class="fa-solid fa-user" style='color:red; margin-top: 3px;'></i>Sign up</a></li>
            <li><a class="dropdown-item" href="adminlogout.php">Logout</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</div>
</div>

