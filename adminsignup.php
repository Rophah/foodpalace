<?php
  include_once("adminnavbarheader.php");
  include_once("classes/adminuser.php");
?>

<body class="ground">
<!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 mb-4">
        <h1 class="mt-4 mb-3 text-center" style="color: #fff; font-size: 4rem;">Administrator page
      <small>Signup</small>
      </h1>
        <?php

        $newobj = new Admin;

        if(isset($_POST['submit'])){

          $error = array ();
          if(empty($_POST['fname'])){
            $error[] = "Please fill in your first name";
          }
          if(empty($_POST['lname'])){
            $error[] = "Please fill in your last name";
          }
          if(empty($_POST['phone'])){
            $error[] = "Please fill in your phone number";
          }
          if(empty($_POST['email'])){
            $error[] = "Please fill in your email address";
          }
          if(empty($_POST['dob'])){
            $error[] = "Please fill in your date of birth";
          }
          if(empty($_FILES['emblem'])){
            $error[] = "Picture is required";
          }
          if(empty($_POST['password'])){
            $error[] = "Please fill in your password";
          }
          
          
          if(!empty($error)){
            echo "<ul class='alert alert-danger'>";
            foreach ($error as $key => $value) {
              echo "<li>$value</li>";
            }
            echo "</ul>";
          }
          else {
            $result = $newobj->ckeckEmailAddress($_POST['email']);

            if ($result == true){
              echo "<div class='alert alert-danger'>Email already existing</div>";
            }

            else{

            $output = $newobj->signup($_POST['fname'], $_POST['lname'], $_POST['email'] , $_POST['dob'] ,$_POST['phone'],$_POST['password'], );
            //var_dump($output);
            //exit;
              if($output == true){
                $message = "1";
                header("Location: adminlogin.php?$msg=$message");
                exit;
              }
              
            }
          }
        }

        ?>

        <form name="registerform" id="registerform" action='' method="post" enctype="multipart/form-data">
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
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phone" required value="<?php

                if(isset($_POST['phone'])){
                  echo $_POST['phone'];
                }
              ?>">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name='email' id="email" required value="<?php

                if(isset($_POST['email'])){
                  echo $_POST['email'];
                }
              ?>">
         <!-- <p class="help-block text-muted">We promise never to spam you!</p> -->
            </div>
          </div>
        <div class="control-group form-group">
            <div class="controls">
              <label>Date of Birth:</label>
              <input type="date" class="form-control" id="dob" name='dob' value="<?php

                if(isset($_POST['dob'])){
                  echo $_POST['dob'];
                }
              ?>">
             
            </div>
          </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Picture</label>
            <input type="file" class="form-control" name="emblem">

            <?php 
               if(isset($error['emblem'])){
                 echo "<p class='text-danger'>".$error['emblem']."</p>";
              }
            ?> 
          </div>
        </div> 
        <div class="control-group form-group">
            <div class="controls">
              <label>Password:</label>
              <input type="password" class="form-control" id="password" name='password'>
             
            </div>
          </div>
          
          <input type="submit" class="btn form-control text-light mt-4" name="submit" id="sendMessageButton" value="Sign Up" style="background-color:#ff006f ">
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</body>
<?php
include ("frontfooter.php");
?>  
