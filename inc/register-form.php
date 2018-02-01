<?php



  $error = "";

  if (array_key_exists("submit", $_POST)) {

    include("connection.php");

    if (!$_POST['email']) {
       $error .= "email req'd<br>";
   }

   if (!$_POST['username']) {
      $error .= "username req'd<br>";
  }

   if (!$_POST['password']) {
       $error .= "password req'd<br>";
   }

   if ($error != "") {
       $error = "<p> There are error(s)</p>".$error;
   } else {

$tchname = mysqli_real_escape_string($link, $_POST['name']);
$tchemail = mysqli_real_escape_string($link, $_POST['email']);
$tchusername = mysqli_real_escape_string($link, $_POST['username']);
$tchpassword = mysqli_real_escape_string($link, $_POST['password']);
$tchclass = mysqli_real_escape_string($link, $_POST['class']);
$tchphnnum = mysqli_real_escape_string($link, $_POST['phone-number']);
$tchtlocn = mysqli_real_escape_string($link, $_POST['tlocn']);
$tchtsub = mysqli_real_escape_string($link, $_POST['tsub']);
$tchfield = mysqli_real_escape_string($link, $_POST['expertise']);

        $queryusm = "SELECT `id` FROM `tch-data` WHERE `username` = '$tchusername'";
        $resultusm = mysqli_query($link, $queryusm);

        $queryeml = "SELECT `id` FROM `tch-data` WHERE `email` = '$tchemail'";
        $resulteml = mysqli_query($link, $queryeml);

        $queryphm = "SELECT `id` FROM `tch-data` WHERE `phone-number` = '$tchphnnum'";
        $resultphm = mysqli_query($link, $queryphm);


        if (mysqli_num_rows($resultusm) > 0) {
          $error .= "username taken<br>";
        }
        if (mysqli_num_rows($resulteml) > 0) {
          $error .= "email taken<br>";
        }
        if (mysqli_num_rows($resultphm) > 0) {
          $error .= "phone number taken<br>";
        }
        if ($error != "") {
            $error = "<p> There are error(s)</p>".$error;
        } else {
          $query = "INSERT INTO `tch-data` (`name`, `email`, `username`, `password`, `class`, `phone-number`, `location`, `subject`, `expertise`) VALUES ('$tchname', '$tchemail', '$tchusername', '$tchpassword', '$tchclass', '$tchphnnum', '$tchtlocn', '$tchtsub', '$tchfield')";

          if (!mysqli_query($link, $query)) {
            $error = "<p> Couldn't sign you up!<br> Try again later</p>"; echo("Error description: " . mysqli_error($link));
          } else {
            $query = "UPDATE `tch-data` SET `password` = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";


            mysqli_query($link, $query);
            $_SESSION['username'] = $tchusername;
            header("Location: welcome-user.php");

          }


        }


   }





  }





?>

<section class="register" style="">

  <div class="container">
<div>
<div id="error" class="center" style="padding-bottom: 30px;"> <?php echo $error; ?> </div>
    <form  action="register.php" method="post">


      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">username</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
        </div>
      </div>

  <div class="form-group row">
    <label for="class" class="col-sm-3 col-form-label">Choose Your class</label>
    <div class="col-sm-9">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls3" value="3">
        <label class="form-check-label" for="cls3">3</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls4" value="4">
        <label class="form-check-label" for="cls4">4</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls5" value="5">
        <label class="form-check-label" for="cls5">5</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls6" value="6">
        <label class="form-check-label" for="cls6">6</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls7" value="7">
        <label class="form-check-label" for="cls7">7</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls8" value="8">
        <label class="form-check-label" for="cls8">8</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="class" id="cls9" value="9">
        <label class="form-check-label" for="cls9">9</label>
      </div>

    </div>
  </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label" for="phone-number" >Phone Number</label>
    <div class="col-auto">
      <input type="text" class="form-control" id="phone-number" name="phone-number" placeholder="Number" required>
    </div>
      <label class="col-form-label" for="tlocn">Select your location</label>
    <div class="col-auto">
        <select class="col-md-15 custom-select" id="tlocn" name="tlocn">
              <option selected>Choose</option>
              <option>BB</option>
              <option>..</option>
              <option>..</option>
              <option>..</option>
              <option>..</option>
              <option>..</option>
              <option>..</option>
        </select>

    </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label" for="tsub">Select your subject</label>
    <div class="col-md-4">
      <select class="col-auto select" id="tsub" name="tsub">
            <option selected value="General-Science">General Science</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Engish">Engish</option>
      </select>
      <div >
        <div class="custom-control custom-checkbox mr-sm-4">
          <input class="custom-control-input advMath" type="checkbox" name="advMath" value="1" id="advMath" disabled="disabled">
          <label class="custom-control-label" for="advMath">Advanced Mathematics (Only for class 9)</label>
        </div>
      </div>

    </div>

  </div>

  <div class="form-group row">
    <label for="expertise" class="col-sm-3 col-form-label">Enter your field</label>
    <div class="col-sm-9">
      <input type="name" class="form-control" id="expertise" name="expertise" placeholder="expertise">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
    </div>
  </div>
    </form>
  </div>
</div>
</section>
