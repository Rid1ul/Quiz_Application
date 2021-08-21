<?php include "database.php"; ?>

<?php session_start(); ?>

<?php

if(!isset($_SESSION['score']))
	$_SESSION['score']=0;

$number = $_POST['number'];
$selected_choice = $_POST['choice']; 
$next = $number+1;

// echo "Question number: ".$number."<br>"." choice: ".$selected_choice."<br>";

$query = "SELECT * FROM choices WHERE question_number='$number' and is_correct=1 ";


$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$correct_choice = $row['id'];

/*
echo "Correct choice: ".$correct_choice."<br>";
echo  "Score: ".$_SESSION['score'];
*/
$query2 = "SELECT * FROM questions";
$results = mysqli_query($conn,$query2);
$total = mysqli_num_rows($results);



if($correct_choice == $selected_choice)
	$_SESSION['score']++;

echo  "Score: ".$_SESSION['score'];



if($number==$total)
{
header("Location: final.php");
    exit();
}
else
	header("Location: question.php?n=".$next);

	


?>