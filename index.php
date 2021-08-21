<?php include "database.php" ; ?>

<?php 

$query = "SELECT * FROM questions";
$result = mysqli_query($conn,$query);
$total = mysqli_num_rows($result);

?>



<!DOCTYPE html>



<html>

    <head>
        <h2>Test Your programming knowledge! </h2>
    </head>
	
	<body>
	     <p>This is multiple choice quiz </p>
	
	    <ul>
		   <li><b> Number of questions: </b> <?php echo $total; ?> </li>
		   <li><b>Type: </b> Multiple Choice </li>
		   <li><b>Estimated time: </b> <?php echo $total*0.5;?> minutes</li>
		</ul>
		
		<a href="question.php?n=1">Start Quiz </a>
	
	</body>


</html>