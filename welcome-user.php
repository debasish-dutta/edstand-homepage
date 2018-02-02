<?php

	 session_start();

	   $error = "";

	 if (array_key_exists("logout", $_GET)) {
	 		unset($_SESSION);
			session_destroy();
			setcookie("username", "", time() - 60*60);
    	$_COOKIE["username"] = "";
			header ("Location:index.php");

	 }


	if(isset($_SESSION['username']))
	{
		$session = $_SESSION['username'];
	}
	else
	{
		$session = null;
	}




?>



<!DOCTYPE HTML>
<meta charset="utf-8">
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images\favicon.png">
  <link rel="stylesheet" href="css\bootstrap.min.css">
  <link href="css\style.css" type="text/css" rel="stylesheet">
  <link href="css\reset.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/v4-shims.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Alegreya:400,700i|Risque|Ubuntu');
  </style>
  <title>edStand: Make your destiny</title>

</head>

<body>
  <div id="app" class="container-fluid center">

    <h1 class="">Welcome <?php echo ucfirst($session); ?></h1>
    <a class="btn btn-outline-success center" href="userProfile.php" role="button">Take me to my profile</a>


			
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js\bootstrap.min.js"></script>
  <script src="js\bootstrap.bundle.min.js"></script>
  <script src="js\jquery-3.2.1.min.js"></script>
  <script src="js\main.js"></script>
  </body>

  </html>
