<?php

	function findUser($username,$password)
	{
		$connection = mysqli_connect("localhost","cd_user","password","cd_livery");
		$result = mysqli_query($connection,"SELECT * FROM users");
		$password = hash('sha512',$_POST["password"]);
		while($user=mysqli_fetch_assoc($result))
		{
			if($username == $user['username']&&strcmp($password,$user['password'])==0)
			{
				return $user;
			}
		}
		return null;
	}
	function findUserbyName($username)
	{
		$connection = mysqli_connect("localhost","cd_user","password","cd_livery");
		$result = mysqli_query($connection,"SELECT * FROM users");
		while($user=mysqli_fetch_assoc($result))
		{
			if($username == $user['username'])
			{
				return $user;
			}
		}
		return null;
	}
	/*function validatePresences($required_fields)
	{
		if($_POST["username"]=="" || $_POST["password"]=="")
		{
			echo "You need to enter both a username and password";
			//header("");
		}
		else
		{
			return;
		}
	}*/
	function validatePresences($required_fields)
	{
		if($_POST["username"]=="" || $_POST["password"]==""||$_POST["password2"]=="")
		{
			echo "You need to enter a username and your password twice";
		}
		else
		{
			return;
		}
	}
	function redirectTo($page)
	{
		header("Location: ".$page);
	}
	function validateLength($string)
	{
		if(strlen($string)>=6)
		{
			return true;
		}
		return false;
	}
	
?>