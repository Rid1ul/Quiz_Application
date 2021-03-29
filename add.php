<?php include("database.php"); ?>
<?php if (isset($_POST['submit']))
{
	/**  get post variables    **/
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];

/**  choice array **/

    $choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];
	
	/*** Insert question query ***/
	$query = "INSERT INTO questions (question_number, text) VALUES ('$question_number','$question_text')";
	$insert_question = mysqli_query($conn,$query);
	
	/**  Validate query and insert choices ***/
	
	if($insert_question)
	{
		foreach($choice as $key => $value)
		if($value !='')
		{
			if($correct_choice = $value)
			{
				$is_correct = 1;
			}
			else 
			{
				$is_correct = 0;
			}
			/*** Insert choices query ***/
			$query2 = "INSERT INTO choices (question_number, is_correct, text) VALUES ('$question_number','$is_correct','$value')";
			$insert_choice = mysqli_query($conn,$query2);
			
			/*** Check choice insert ***/
			
			if($insert_choice)
			{
				continue ;
			}
			else
			{
				die("Error in insertion");
			}

			
		}
		$msg = "Question inserted";
	}
	
}
/*** Find total number of questions inserted ***/

$query3 = "select * from questions";
$result = mysqli_query($conn,$query3);
$total = mysqli_num_rows($result);
$next = $total + 1;

?>
<!DOCTYPE html>
<html>
<head>
<title>Online Quiz</title>
</head>

<body>

<h2> Add a question </h2>
<?php if(isset($msg))
{
	echo '<p>'.$msg.'</p>';
}
?>
<form method="post" action = "add.php">

<p>
<label>Question Number: </label>
<input type="number" value = "<?php echo $next; ?>" name="question_number"> <br>
</p>

<p>
<label>Question Text: </label>
<input type="text" name="question_text"> <br>
</p>

<p>
<label>Choice #1: </label>
<input type="text" name="choice1"> <br>
</p>

<p>
<label>Choice #2: </label>
<input type="text" name="choice2"> <br>
</p>

<p>
<label>Choice #3: </label>
<input type="text" name="choice3"> <br>
</p>

<p>
<label>Choice #4 </label>
<input type="text" name="choice4"> <br>
</p>

<p>
<label>Choice #5 </label>
<input type="text" name="choice5"> <br>
</p>

<p>
<label>Correct choice number: </label>
<input type="number" name="correct_choice"> <br>
</p>

<input type="submit" name="submit" value="submit">

</form>




</body>

</html>