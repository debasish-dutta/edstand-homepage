<?php
	 session_start();
$var_value = $_SESSION['varname'];
      //echo $var_value;

      $error = "";

      if (array_key_exists("submit", $_POST) ) {

          include("connection.php");



          /*if (!$_POST['email']) {
              $error .= "email req'd<br>";
          }*/


          if (!$_POST['password']) {
              $error .= "password req'd<br>";
          }

          if ($error != "") {
              $error = "<p> There are error(s)</p>".$error;
          } else {



              //$tchemail = mysqli_real_escape_string($link, $_POST['email']);
              //$queryemail = "SELECT id,email,username FROM `tch-data` WHERE `username` = '$var_value'";
              //$resultemail = mysqli_query($link, $queryemail);
              //$row = mysqli_fetch_array($resultemail);

              //if(isset($row)){

                        $tchspassword = mysqli_real_escape_string($link, $_POST['password']);

                        if ($tchspassword == mysqli_real_escape_string($link, $_POST['cfm_password'])) {

                      $hashedpassword = md5($tchspassword);


                  $usql = "UPDATE `tch-data` SET `password` ='$hashedpassword' WHERE `username` ='$var_value'";

                  $result = mysqli_query($link, $usql);

                  if (isset($result)) {

                    unset($_SESSION);
                    session_destroy();
                    echo "Password reset. click "?> <a href="login.php">here</a><?php "to login";
                  } else {
                    unset($_SESSION);
              			session_destroy();
                    echo "failed to reset password. Try again Later";}
                } else {
                  unset($_SESSION);
            			session_destroy();
                  echo "Password and confirm password donot match";
                }
//}




      }

    }










 ?>

<div class="container">

<!--  <form class="" method="POST">
   <h2 class="form-signin-heading">Enter your email for confirmation</h2><br>
   <div id="error"> <?php echo $error; ?> </div>
   <div class="form-group col-sm-6 center">
     <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"   name="email">
   </div>
   <div class="form-check">
       <input type="hidden" name="email-sub" value="1">
       <button type="submit" id="email-sub" name="email-sub" value="email-sub" class="btn btn-primary">Confirm Email</button>
   </div>
 </form>-->
 <form class="" method="POST">
  <h2 class="form-signin-heading">Enter new Password</h2><br>
  <div id="error"> <?php echo $error; ?> </div>
  <div class="form-group col-sm-6 center">
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter password"   name="password">
  </div>
  <div class="form-group col-sm-6 center">
    <input type="password" class="form-control" id="cfm_password" aria-describedby="emailHelp" placeholder="confirm password"   name="cfm_password">
  </div>
  <div class="form-check">
  <!--<input type="hidden" name="sub-pass" value="0">-->
  <button type="submit" id="submit" name="submit" value="sub-pass"class="btn btn-primary">Change Password</button>
  </div>
</form>

</div>
