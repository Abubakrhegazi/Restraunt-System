<?php
include_once "UserClass.php";


if(isset($_POST['Submit'])){ //check if form was submitted

	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];
	
	if(User::InsertinDB_Static($UserName,$Password)){
		header("Location:index.php");
	}
	
}
?>
<h1>SignUp</h1>
<form action="" method="post">
  UserName:<br>
  <input type="text" name="UserName"><br>
  Password:<br>
  <input type="text" name="Password"><br>
  <input type="submit" value="Done" name="Submit">
  <input type="reset">

</form>