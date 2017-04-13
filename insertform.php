<?php require_once('C:/wamp64/www/cd/Includes/Functions.php'); 
	if(isset($_POST['name']))
	{
		echo newEntry($_POST['name'],$_POST['genre'],(int)$_POST['visible'],(int)$_POST['stock'],(int)$_POST['releaseyear'],(int)$_POST['ItemType']);
	}
?>
<body>
Select an item type!
<select name="ItemType" method="post">
  <option value="0">Album</option>
  <option value="1">Movie</option>
  <option value="2">Game</option>
</select>

<form action="insertform.php" method="post">
	Name: <input type="text" name="name"></br>
	Genre: <input type="text" name="genre"></br>
	Visible: <input type="text" name="visible"></br>
	Stock: <input type="text" name="stock"></br>
	Release Year: <input type="text" name="releaseyear"></br></br>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
