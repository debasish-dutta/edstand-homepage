<?php
	 session_start();
$error = "";

if (array_key_exists("submit", $_POST)) {

      include("connection.php");

        if (!$_POST['username']) {
           $error .= "username req'd<br>";
       }

       if ($error != "") {
           $error .= "<p> There are error(s)</p>".$error;
       } else {

         $tchusername = mysqli_real_escape_string($link, $_POST['username']);

         $queryusm = "SELECT id,username FROM `tch-data` WHERE `username` = '$tchusername'";

         $resultusm = mysqli_query($link, $queryusm);

         $rowd = mysqli_fetch_array($resultusm);


        if(isset($rowd)) {


                    $_SESSION['varname'] = $rowd['username'];
                        header ("Location: password-reset.php");
      		}
          else{
          		echo "User name does not exist in database";
          }
}
}
?>

    <div class="conatiner">
    <form class="" method="POST">
      <h2 class="form-signin-heading">Forgot Password</h2><br>
      <div id="error"> <?php echo $error; ?> </div>
      <div class="form-group col-sm-6 center">
        <input type="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username"   name="username">
      </div>
      <div class="form-check">
      <button type="submit" id="submit" name="submit" value="ForgotPassword"class="btn btn-primary">Forgot Password</button>
      </div><br>
      <div class="form-check">
      <a class="btn btn-outline-success btn-lg" href="login.php" role="button">Login</a>
      </div>
    </form>


  </div>
