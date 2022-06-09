<?php
ob_start();
  include_once("navbarheader.php");
  include_once("classes/useredit.php");
  
?>

<body class="ground">
<!-- Page Content -->
  <div class="container">
 
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 mb-4 ">
        <h1 class="mt-4 mb-3 text-center" style="color: #fff">Customer sign up page
      </h1>

        <?php

        $newobj = new User;

        if(isset($_POST['submit'])){

          $error = array ();
          if(empty($_POST['fname'])){
            $error[] = "Please fill in your first name";
          }
          if(empty($_POST['lname'])){
            $error[] = "Please fill in your last name";
          }
          if(empty($_POST['email'])){
            $error[] = "Please fill in your email address";
          }
          
          if(empty($_POST['password'])){
            $error[] = "Please fill in your password";
          }
          if(empty($_POST['samepassword'])){
            $error[] = "Please confirm your password";
          }
          if($_POST['password'] != $_POST['samepassword']){
            $error[] = "Please the password must match";
          }
          if(!empty($error)){
            echo "<ul class='alert alert-danger'>";
            foreach ($error as $key => $value) {
              echo "<li>$value</li>";
            }
            echo "</ul>";
          }
          $result = $newobj->ckeckEmailAddress($_POST['email']);

          if ($result == true){
            echo "<div class='alert alert-danger'>Email already existing</div>"; 
          }
          else {
            $output = $newobj->signup($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['samepassword']);
            echo $output;
            header("Location: loginsecond.php");
            ob_flush();
          }
        }
       
        ?>

        <form name="registerform" id="registerform" action='' method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label>First Name:</label>
              <input type="text" class="form-control" id="fname" name='fname' value="<?php

                if(isset($_POST['fname'])){
                  echo $_POST['fname'];
                }
              ?>">
              
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Last Name:</label>
              <input type="text" class="form-control" id="lname" name='lname' value="<?php

                if(isset($_POST['lname'])){
                  echo $_POST['lname'];
                }
              ?>">
             
            </div>
          </div>
          <!--  -->
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name='email' id="email" required value="<?php

                if(isset($_POST['email'])){
                  echo $_POST['email'];
                }
              ?>">
         <p class="help-block text-light">We promise never to spam you!</p>
            </div>
          </div>
       
          
        <div class="control-group form-group">
            <div class="controls">
              <label>Password:</label>
              <input type="password" class="form-control" id="password" name='password'>
             
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Please re-enter your password:</label>
              <input type="password" class="form-control" id="samepassword" name='samepassword'>
             
            </div>
          </div>
          <input type="submit" class="btn form-control text-light mt-4" name="submit" id="sendMessageButton" value="Sign Up" style="background-color:#ff006f ">
        </form>
      </div>

    </div>
    
  </div>
  <!-- /.container -->
<!-- <?php
//include ("frontfooter.php");
?>  --> 
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>