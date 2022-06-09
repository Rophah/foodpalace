<?php
  
	ob_start();
	include_once("classes/useredit.php");
  include_once("navbarheader.php");
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
            //create user object -->

            $obj = new User;
            
            session_start();
            if (isset($_SESSION['myid'])) {
              $myid=$_SESSION['myid'];
            }
            //to access login method -->
            $message = $obj->login($_POST['email'], $_POST['password']);
            // var_dump($message);
            // 	exit;

            if($message){
              
              //redirect to dashboard.php
              header("Location: indexlogin.php");
              exit;
              ob_flush();
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
      <div class="col-md-1"></div>
    	<div class="col-md-5 col-sm-6">
    		<div class="upperoutline">
    			<img src="images/signup.jpg" class="img-fluid" >
    		</div>
    		
    	</div>
    	<div class="col-md-5 col-sm-6">
    		<h1 class="mb-3 mt-2" style="color: #fff;">Customer page
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
	          <div class="small">***New user, Please <a href="signup.php" class="text-danger">sign up!!!</a></div>
          </form>  
	    </div>
	    <div class="col-md-1 "></div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>