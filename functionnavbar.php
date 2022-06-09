<?php
include_once('classes/useredit.php');

session_start();
if (isset($_SESSION['mylogchecker']) && ($_SESSION['mylogchecker'] = "Rt_0_0_rab") && $_SESSION['email']){

}else{
  header("Location: index.php");
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
  <!-- <link rel="stylesheet" href="style2.css"> -->
 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> 
   <link href="css/main.css" rel="stylesheet" type="text/css">
  <link href="css/all.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #searchresult{
      position: absolute;
      /*border:1px solid #000;*/
      background-color: #fff;
    }
  </style>
  <title>Food Palace: Order your food</title>
</head>

<div class="container-fluid" style="font-size: 1.2rem; background-color: white;">
  <div class="row">
    
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid" >
    <a class="navbar-brand" href="index.php"><i class="fa-duotone fa-bowl-hot"></i>f<span style="color:red">OO</span>D pALACE</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img class="menuimg" src="images/menu.png" alt="menu">
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house" style='color:red'></i>Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="categoryindex.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >CATEGORY OF FOOD
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="localdish.php">Local dishes<span class="sidespace"><img class="menuimg" src="images/images.jpg" alt="Amala"></span></a></li>
            <li><a class="dropdown-item" href="intercontinental.php">Intercontinental dishes<span class="sidespace"><img class="menuimg" src="images/plaintainandpuffpuff.jpg" alt="Plantain"></span></a></li>
            <li><a class="dropdown-item" href="snacks.php">Snacks<span class="sidespace"><img class="menuimg" src="images/menu.png" alt="Snacks"></span></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menudata.php">MENU</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tablepreserve.php">TABLE RESERVATION</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >WELCOME <?php echo $_SESSION['lastname']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="editprofile.php"><i class="fa-solid fa-user" style='color:red; margin-top: 3px;'></i>Edit Profile</a></li>
            <li><a class="dropdown-item" href="viewprofile.php"><i class="fa-solid fa-user" style='color:red; margin-top: 3px;'></i>View Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <form class="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 40px; border-color: red; "  id="search">
        
        <!-- <button class="btn btn-outline-danger" type="submit" style="background-color: red; color:#fff; border-radius: 40px; margin-left: -50px;">Search</button> -->
        <div id="searchresult" onclick="search()"></div>
        <!-- <i class="fa-solid fa-cart-shopping" style="color:red; margin-right:20px; margin-top: 10px;"></i> -->
      </form> 
    </div>
  </div>
</nav>

</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
  
<script type="text/javascript">
  $(document).ready(function(){
      //function to search customer
      $('#search').keyup(function(){
        var searchvalue = $(this).val();
        $('#searchresult').html(searchvalue);

      $.ajax({
        type:"post",
        data: "search=" + searchvalue,
        url:"search.php",
        success: function(msg){
          $('#searchresult').html(msg);
        },
        error: function(errors){
          console.log('errors');
          alert("Oops, something happened!");
        }
      })
    });
  });

  function search(){
    var empty = document.getElementById("searchresult").innerHTML;
    if((empty == "This food is not available") || (empty == "Type in to check list of available food")){}else{
      //document.getElementById("searchresult").innerHTML = empty;
      location.replace("menudata.php");

    }
  }
</script>