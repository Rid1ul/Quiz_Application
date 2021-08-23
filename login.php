<?php include "database.php" ; ?>
<?php session_start(); ?>

<!DOCTYPE html>

<html>

    
	
	<body>
	     
	
	    <p>
	        
	    </p>
		 
		 <form method="POST" action = "login.php" align="center">
		     
			<header>Email </header>			<input name = "email" type="text" placeholder = "Email"  >  <br>
			<header>Password </header>		<input name = "password" type="password" placeholder = "Password" >
			<br><br>
			
			
			<input type= "Submit" name="submit" value ="Submit" >
			
		</form> 

	
	</body>


</html>

<?php
$msg = "Wrong credentials !";
if(isset($_POST["submit"]))
{
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	
	$query = "SELECT * FROM `admin` WHERE email='$email' and password='$pwd'";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	
	if(is_array($row))
	{
		$_SESSION['email']= $row['email'];
		$_SESSION['password'] = $row['password'];
	}
	else 
	echo '<p style="color:red" align="center">'.$msg.'</p>';
	
	if(isset($_SESSION['email']))
	{
		header("Location:home.php");
	}
	
}


?>