<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>LoginProcessing</title>
	</head>
	<body>
	<?php
		$connection = mysqli_connect("localhost","cd_user","password","cd_livery");
		$username=$_POST["username"];
		$password=hash('sha512',$_POST["password"]);
		//echo $password;
		$result = mysqli_query($connection,"SELECT * FROM users");
		$namebool = false;
		$passbool = false;
		while($user=mysqli_fetch_assoc($result))
		{
			if($username == $user['username']&&strcmp($password,$user['password'])==0)
			{
				echo "success";
				break;
			}
		}
	?>
	</body>
</html>
