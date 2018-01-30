<?php

  include("connection.php");

  function get_profile_info($tchusername)
  	{

global $link;

        $tchname ="";
        $tchemail ="";
        $tchtlocn ="";

  		$queryusm = "SELECT * FROM `tch-data` WHERE `username` ='$tchusername'";

  		$resultusm = mysqli_query($link, $queryusm);

      if(mysqli_num_rows($resultusm)>0)
      		{

            echo "<div class='col-md-3'>
            </div>";

      			while($row = mysqli_fetch_assoc($resultusm)) {
      				echo "<div class='col-md'>";
      				echo "Name : ".$tchname = $row['name'].'<br>';
      				echo "Email : ".$tchemail = $row['email'].'<br>';
      				echo "Location : ".$tchtlocn = $row['location'].'<br>';

      				if($row['expertise']=='')
      				{
      					echo 'Expertise : You haven\'t add any expertise yet.<br>';
      				}

      				else
      				{
      					echo "Expertise : ".$row['expertise'];
      				}

      				echo "</div>";
      			}
          }
  	}

  	function get_avatar_image($user)
  	{
  		$pic = 0;
  		$upload_folder = "uploads";
  		$user_folder = $upload_folder.'/'.$user;
  		$avatar_image_folder = $user_folder.'/avatar';

  		if(is_dir($upload_folder))
  		{
  			if(is_dir($user_folder))
  			{

  			}
  			else
  			{
  				mkdir($user_folder);
  			}
  		}

  		else
  		{
  			mkdir($upload_folder);
  			if(is_dir($user_folder))
  			{

  			}
  			else
  			{
  				mkdir($user_folder);
  			}
  		}

  		if(is_dir($avatar_image_folder))
  		{

  		}
  		else
  		{
  			mkdir($avatar_image_folder);
  		}

  		if($handle = opendir($avatar_image_folder))
  		{
  			while(false!== ($entry = readdir($handle)))
  			{
  				if(($entry!='.') and ($entry!='..'))
  				{
  					$pic = 1;
  					$avatar_image_path = $avatar_image_folder.'/'.$entry;
  					echo "<img src=$avatar_image_path alt=$entry id=avatar-image-id width='300px'/>";
  				}
  			}

  			closedir($handle);
  		}

  		if($pic==0)
  		{
  			echo "<img src='img/user-default.jpg' id='avatar-image-id' width='300px'/>";
  		}
  	}



?>


<section class="">
  <div class="section-header center">
      <h1>Welcome <?php echo ucfirst($session); ?></h1>
  </div>
  <div class="container">
    <div class="row">
			<div class="col-md-4 avatar" style="margin:7px;">
				<h2>Avatar</h2>
				<?php get_avatar_image($session);?>
				<div class="upload-avatar">
					<input type="file" name="user-avatar-upload" id="user-avatar-upload">
				</div>
			</div>
			<div class="col-md-7 profile" style="margin:7px;">
				<h2>Profile Information</h2>
				<div class="profile-information">

					<?php get_profile_info($session);?>
		    </div>
      </div>
    </div>
    <div class="" style="width:1px; height :100%;">
      <h6></h6>
    </div>
</div>
</section>
