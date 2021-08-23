<?php session_start(); ?>
<?php
if(isset($_SESSION['email']))
{
   echo "Welcome ".$_SESSION['email'];
}
else header("Location: login.php");


?>

<!DOCTYPE html>



<html>

    
	
	<body>
	     
		<br><br>
		<a href="add.php">Add Questions and choices</a>
		
		<br><br>
		<a href="logout.php">Logout</a>
		
		
	
	</body>


</html>