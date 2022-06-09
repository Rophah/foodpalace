<?php
  
  include_once("functionnavbar.php");
  include_once("classes/useredit.php");
  

  if (!empty($_SESSION['myid'])){       
          $userid=$_SESSION['myid'];
          
      } 

  $newobj = new User;
  $finduser = $newobj->finduser($userid);
?>

<body class="ground">
<!-- Page Content -->
  <div class="container">
 
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 mb-4 ">
        <h1 class="mt-4 mb-3 text-center" style="color: #fff">Edit your profile 
      </h1>
        <?php
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
          if(empty($_POST['password'])){
            $error[] = "Please fill in your password";
          }
          if(empty($_POST['samepassword'])){
            $error[] = "Please confirm in your password";
          }
          if($_POST['samepassword'] != $_POST['password']){
            $error[] = "Please the password must match";
          }
          if(!empty($error)){
            echo "<ul class='alert alert-danger'>";
            foreach ($error as $key => $value) {
              echo "<li>$value</li>";
            }
            echo "</ul>";
            
          }
          else {
            
            if($_POST['samepassword'] != $_POST['password']){
            $error[] = "Please the password must match";
            }
            else{

            $output = $newobj->updateuser($_POST['fname'], $_POST['lname'],$_POST['phone'], $_POST['email'] , $_POST['dob'],$_POST['password'], $_POST['samepassword'], $userid);
            
            echo "<div class='alert alert-success'>Your profile has been successfully updated! 🎉</div>";
            }
          }
        }

        ?>

        <form method="post" action="" >
          <div class="control-group form-group">
            <div class="controls">
              <label>First Name:</label>
              <input type="text" class="form-control" id="fname" name='fname' value="<?php

                if(isset($finduser[0]['firstname'])){
                  echo $finduser[0]['firstname'];
                }
              ?>">
              
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Last Name:</label>
              <input type="text" class="form-control" id="lname" name='lname' value="<?php

                if(isset($finduser[0]['lastname'])){
                  echo $finduser[0]['lastname'];
                }
              ?>">
             
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phone" required value="<?php

                // if(isset($_POST['phone'])){
                //   echo $_POST['phone'];
                // }
                if(isset($finduser[0]['phonenumber'])){
                  echo $finduser[0]['phonenumber'];
                }
              ?>">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name='email' id="email" required value="<?php

                if(isset($finduser[0]['emailaddress'])){
                  echo $finduser[0]['emailaddress'];
                }
              ?>" readonly>
         <!-- <p class="help-block text-muted">We promise never to spam you!</p> -->
            </div>
          </div>
        <div class="control-group form-group">
            <div class="controls">
              <label>Date of Birth:</label>
              <input type="date" class="form-control" id="dob" name='dob' value="<?php

                // if(isset($_POST['dob'])){
                //   echo $_POST['dob'];
                // }
                if(isset($finduser[0]['dateofbirth'])){
                  echo $finduser[0]['dateofbirth'];
                }
              ?>">
             
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
          <input type="submit" class="btn form-control text-light mt-4" name="submit" id="sendMessageButton" value="Update profile" style="background-color:#ff006f ">
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
</body>
  <!-- /.container -->
<?php
include ("frontfooter.php");
?>  
