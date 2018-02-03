<?php

	session_start();
	$pic = 0;
	$filetodelete = "";
	$filename = $_FILES['avatar']['name'];
	//echo $filename;

	$tmpname = $_FILES['avatar']['tmp_name'];
	$session = $_SESSION['username'];
	$avatar_image_folder = 'uploads/'.$session.'/avatar';
	$destination = 'uploads/'.$session.'/avatar/'.$filename;

	move_uploaded_file($tmpname, $destination);


	if($handle = opendir($avatar_image_folder))
		{
			while(false!== ($entry = readdir($handle)))
			{
				if(($entry!='.') and ($entry!='..') and ($entry!=$filename))
				{
					$pic = 1;
					$filetodelete = $entry;
				}
			}

			closedir($handle);
		}

		if($pic==1)
		{
			if(unlink($avatar_image_folder.'/'.$filetodelete))
			{

			}
		}

		if($handle = opendir($avatar_image_folder))
		{
			while(false!== ($entry = readdir($handle)))
			{
				if(($entry!='.') and ($entry!='..'))
				{

					echo $avatar_image_path = $avatar_image_folder.'/'.$entry;

				}
			}

			closedir($handle);
		}
?>
