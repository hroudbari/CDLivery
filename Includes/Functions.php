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
			return false;
		}
		return true;
	}
	function redirectTo($page)
	{
		header("Location: ".$page);
	}
	function validateLength($string)
	{
		if(strlen($string)>=5)
		{
			return true;
		}
		return false;
	}
	function addUser($username,$password)
	{
		$password = hash('sha512',$password);
		$connection = mysqli_connect("localhost","cd_user","password","cd_livery");
		$query = "INSERT INTO users(username,password)
				  VALUES ('{$username}','{$password}')";
		$result = mysqli_query($connection,$query);
		if($result == false)
			return false;
		else
		{
			return true;
		}
	}
	function newEntry($name,$genre,$stock,$releaseyear,$visible,$price,$type)
	{
		$connection=mysqli_connect("localhost","cd_user","password","cd_livery");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{	
			$query  = "INSERT INTO cds (";
			$query .= "  name, type, genre, stock, releaseyear, visible, price";
			$query .= ") VALUES (";
			$query .= "'$_POST[name]','$_POST[type]','$_POST[genre]','$_POST[stock]','$_POST[releaseyear]','$_POST[visible]','$_POST[price]')";
			$query .= ")";
		}
		$result = mysqli_query($connection, $query);

		if ($result && mysqli_affected_rows($connection) == 1) 
		{
			$result= "Success!";
		} 
		else 
		{
			die("Database query failed. " . mysqli_error($connection));
		}
		mysqli_close($connection);
		return $result;
	}
?>