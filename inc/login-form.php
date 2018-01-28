<?php
session_start();
  $error = "";

  if (array_key_exists("submit", $_POST)) {

    include("connection.php");

    if (!$_POST['username']) {
       $error .= "username req'd<br>";
   }

    if (!$_POST['password']) {
        $error .= "password req'd<br>";
    }

    if ($error != "") {
        $error = "<p> There are error(s)</p>".$error;
    } else {

      $tchusername = mysqli_real_escape_string($link, $_POST['username']);
      $tchpassword = mysqli_real_escape_string($link, $_POST['password']);

      $query = "SELECT * FROM `tch-data` WHERE `username` = $tchusername";

      $result = mysqli_query($link, $query);

      $row = mysqli_fetch_array($result);

      if(isset($row)) {
        $tchpassword == $row['password'] {

          $_SESSION['username'] = $row['username'];

          if ($_POST['stayLoggedIn'] == '1') {
            setcookie("username", $row['username'], time() + 60*60*24*365);
          }

            header("Location: index.php")
        } else {

          $error = "WRONG password";
        }
      } else {

        $error = "That email/passowrd combination cannot be found";
      }




    }





  }






?>


<section class="login" style="padding: 170px;">

	<div class="container">
		<div >
      <div id="error"> <?php echo $error; ?> </div>
      <form class="" action="login.php" method="post">
          <div class="form-group col-5 center">
            <input type="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username"  value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>">
          </div>
          <div class="form-group col-5 center">
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="stayLoggedIn" value="1" id="loggedInCheck">
            <label class="form-check-label" for="loggedInCheck">Keep me logged In!</label>
          </div>
          <div class="form-check">
          <button type="submit" d="submit" name="submit" value="Login"class="btn btn-primary">Submit</button>
          </div>
          <div class="form-check">
          <label for="sign-up">Don't have an account? </label>
          </div>
          <div class="form-check">
          <a class="btn btn-outline-success btn-lg" href="register.php" role="button" name="Sign-up">Sign-up</a>
        </div>
      </form>
			<div id="error">

			</div>
			<div id="success">

			</div>
		</div>
	</div>
</section>
