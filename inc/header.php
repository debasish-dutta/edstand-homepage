<?php

	 session_start();

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
  <div id="app" class="container-fluid">
    <nav class="navbar  navbar-expand-lg navbar-light bg-faded">
      <a class="navbar-brand" href="index.php">
             <img src="images\edStand@favicon.jpg" width="160" height="70" alt="">
           </a>
      <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
      <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="support.php">Support</a>
          </li>

        </ul>
        <ul class="navbar-nav">
					<li class="nav-item">
						<?php
								if($session==null)
								{
							?>
						<a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php"><i class="fas fa-user-plus"></i>SignUp</a>
					</li>
					<?php
								}
								else
								{
							?>
					<li class="nav-item">
							<a class="nav-link" href="userProfile.php"><i class="fas fa-user"></i></i>My Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
					</li>
					<?php
				}
							?>

				</ul>
      </div>
    </nav>
  </div>
