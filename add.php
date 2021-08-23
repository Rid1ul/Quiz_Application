<?php session_start(); 
if(!isset($_SESSION['email']))
{
	header("Location: login.php");
}


?>
<?php include "database.php"; ?>

<?php

if(isset($_POST['submit']))
{
	$question_number = $_POST["question_number"] ;
	$question_text = $_POST["question_text"] ; 
	$correct_choice = $_POST["correct_choice"];
	$choice = array();
	
	$choice[1] = $_POST["choice1"];
	$choice[2] = $_POST["choice2"];
	$choice[3] = $_POST["choice3"];
	$choice[4] = $_POST["choice4"];
	$choice[5] = $_POST["choice5"];
	
	$query = "INSERT INTO `questions` (`question_number`, `text`) VALUES ('$question_number', '$question_text')";
	$insert_question = mysqli_query($conn,$query); 
	
	
	if($insert_question)
	{
		foreach($choice as $choices => $value)
		{
			if($value != '')
			{
				if($correct_choice == $choices)
				{
					$is_correct = 1;
				}
				else 
				{
					$is_correct = 0;
				}
				$query2= "INSERT INTO `choices` (`question_number`, `is_correct`, `text`) VALUES ('$question_number', '$is_correct', '$value');";
				$insert_choice = mysqli_query($conn, $query2);
				
				if($insert_choice)
				{
					continue;
				}
				else
				{
					echo "Insertion error";
				}

			}
			else continue;
		}
		$msg = "You have successfully inserted a question and its choices !";
	}
	
}

$query3 = "SELECT * FROM questions";
$result = mysqli_query($conn,$query3);
$total = mysqli_num_rows($result);
$next = $total+1;
echo "<br>Number of question: ".$total." Next : ".$next;
?>


<!DOCTYPE html>

<html>

    <head>
        <h2>Add A Question And Its Choices</h2>
    </head>
	<?php
	if(isset($msg))
	{
		echo '<p style="color:green">'.$msg.'</p>';
	}
	
	?>
	
	<body>
	     
		 <form method="POST" action="add.php">
		     <p>
			 <label> Question number: </label> 
			 <input type="number" value = "<?php echo $next; ?>" name="question_number" />
			 </p>
			 
			 <p>
			 <label> Question text: </label> 
			 <input type="text" name="question_text" size="80" />
			 </p>
			 
			 <p>
			 <label> Choice #1: </label> 
			 <input type="text" name="choice1" size="50" />
			 </p>
			 
			 <p>
			 <label> choice #2: </label> 
			 <input type="text" name="choice2" size="50" />
			 </p>
			 
			 <p>
			 <label> Choice #3: </label> 
			 <input type="text" name="choice3" size="50" />
			 </p>
			 
			 <p>
			 <label> Choice #4: </label> 
			 <input type="text" name="choice4" size="50" />
			 </p>
			
			<p>
			 <label>Choice #5: </label> 
			 <input type="text" name="choice5" size="50" />
			</p>
			
			<p>
			 <label> Correct Choice Number: </label> 
			 <input type="number" name="correct_choice" />
			 </p>
			 
			 <input type="Submit" name="submit" value="Submit">
		 
		 </form>
	
	    
		<br><br>
		<a href="logout.php">Logout</a>
		
	
	</body>


</html>