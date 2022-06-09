<?php
session_start();
if (isset($_SESSION['orptiyek']) && $_SESSION['orptiyek'] == "onlineordering"){
	//echo "Welcome";
 }
	else {
	header("Location: http://localhost/onlineordering/");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title>Food Palace: Order your food</title>
  <style type="text/css">
    
    /*div{
      border:1px solid black;
    }*/

    
  </style>
</head>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex ml-5">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end">
      
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="story.php">Our Story</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categoryindex.php">Category</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
 -->

<nav class="navbar navbar-expand-lg " >
  <div class="container bgcolor">
    <a class="navbar-brand small" href="#" style="font-size: 10px italic;"><i class="fa-duotone fa-bowl-hot"></i>f<span style="color:red">OO</span>D pALACE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style='color:black'><i class="fa-solid fa-house" style='color:red'></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categoryindex.php" style='color:black;'>CATEGORY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tablepreserve.php" style='color:black;'>TABLE RESERVATION</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style='color:black;'>
           <i class="fa-solid fa-user" style='color:red'></i> ACCOUNT
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item" href="signup.php"><i class="fa-solid fa-right-to-bracket" style='color:red'></i>  Sign Up
            </a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius: 40px; border-color: red; margin-right: -35px; ">
        <button class="btn " style="background-color: red; color:#fff; border-radius: 40px;" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>