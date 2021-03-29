<?php include("database.php"); ?>
<?php session_start();?>

<?php
if(!isset($_SESSION['score']))
{
	$_SESSION['score']=0;

}
	
    /* Fetching question number and selected choice */
	
if ($_POST)
{
	$number = $_POST['number']; 
	$selected_choice = $_POST['choice'];
	
	$next = $number+1;	
}	
	
	/* Finding the total number of questions */
	
	$query2 = "select * from questions";
$result2 = mysqli_query($conn,$query2);
$total = mysqli_num_rows($result2);


/* Fetcing the correct choice  */

$query = "SELECT * FROM choices WHERE question_number='$number' and is_correct = 1" ;

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$correct_choice = $row['id']; 


/* Matching the selected choice with correct choice and adding to the score */

if($correct_choice ==  $selected_choice)
{
	$_SESSION['score']++;
}	


/* Checking if this is the last question and redirect  */

if($number == $total) 
{
	header("Location: final.php");
} else
{
	header("Location: question.php?n=".$next);	
}
	
	
	







?>