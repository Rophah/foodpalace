<?php

	include_once("adminnavbarheader.php");
	include_once("classes/adminuser.php");

?>
<body class="ground">
<div class="container-fluid mt-5 ">
	

	<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      //validate
        if (empty($_POST['email'])){
          $errors['email'] = "Email address field cannot be empty";
        }

        if (empty($_POST['password'])){
          $errors['password'] = "Password field cannot be empty";
        }

        if (empty($errors)){

          // <!-- //include your user class -->
          include_once("classes/useredit.php");
           //create user object -->

          $obj = new Admin;

           //to access login method -->
          $message = $obj->login($_POST['email'], $_POST['password']);

          if($message){
            //redirect to dashboard.php
            header("Location: admindashboard.php");
            exit;
          }
            else{
              echo "<div class='alert alert-danger'>Invalid email address or password</div>";
            }
          
        }else{
          echo "<ul class='alert alert-danger'>";
          foreach ($errors as $key => $value) {
            echo "<li>$value</li>";
          }
          echo "</ul>";
        }
    }
      
	?>
	
	
    <div class="row">
      <div class="col-md-2 col-sm-2"></div>
      <div class="col-md-4 col-sm-4 " >
        <div class="upperoutline">
          <img src="images/signup.jpg" class="imgoutline img-fluid" >
          <div class="imgborder"></div>
        </div>
        
      </div>
      <div class="col-md-4 col-sm-3 justify-align-center">
        <h1 class="mt-4 mb-3" style="color: #fff;">Administrator page
            <small>Login</small>
        </h1>
      <form name="registerform" id="registerform" action='' method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Email address</label>
                <input type="text" class="form-control" id="email" name='email'>
                
              </div>
            </div>
            <div class="control-group form-group mb-3">
              <div class="controls">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name='password'>
               
              </div>
            </div>
            
            <div class="control-group form-group">
              <div class="controls">
                
                <input type="submit" class="form-control text-light" style="background-color:#ff006f " id="submit" name='submit'>
               
              </div>
            </div>
            <div class="small">***New admin, Please <a href="adminsignup.php" class="text-danger">sign up!!!</a></div>
      </div>
      <div class="col-md-2 col-sm-3"></div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>