<?php include "database.php" ?>
<?php

$number = (int) $_GET['n'];

echo "Question number is ".$number;

$query = "select * from questions where question_number = '$number'";

$result = mysqli_query($conn,$query);
$question = mysqli_fetch_assoc($result);

 ///////////********/////
$query2 = "SELECT * from choices WHERE question_number = '$number'";


$results = mysqli_query($conn,$query2);


$query3 = "SELECT * FROM questions";
$r = mysqli_query($conn,$query3);
$total = mysqli_num_rows($r);
 
 
?>


<!DOCTYPE html>

<html>
<br><br>
    
	
	<body>
	     Question <?php echo $number; ?> of <?php echo $total; ?>
	
	    <p>
	        <?php echo $question['text']; ?> 
	    </p>
		 
		 <form method="POST" action = "process.php">
		     <ul>
			 <?php while($row = mysqli_fetch_assoc($results)){ ?>
			    <li> <input name = "choice" type="radio" value= <?php echo $row['id'];?> > <?php echo $row['text']; }?> </li>
			 
			</ul>
			<input type= "Submit" value ="Submit" >
			<input type="hidden" name="number" value= "<?php echo $number;?>" />  
		</form> 

	
	</body>


</html>