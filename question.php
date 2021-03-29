<?php include("database.php") ?>
<?php session_start();?>


<?php
$number  = (int) $_GET['n'];


//Fetch question . . . .
$query = "SELECT * FROM questions where question_number = '$number' ";

$result = mysqli_query($conn,$query);

$question = mysqli_fetch_array($result);

$total  = mysqli_num_rows($result);

// Fetch choices

$query2 = "select * from choices where question_number = '$number'";
$results = mysqli_query($conn, $query2);


/*** Calculating total number of questions  ***/

$query = "select * from questions";
$result = mysqli_query($conn,$query);
$total = mysqli_num_rows($result);



?>

<!DOCTYPE html>
<html>
<head>
<title>Online Quiz</title>
</head>
<body>
Question <?php echo $number;?> of <?php echo $total ?>
<p><?php echo $question['text']; ?></p>

<form method="post" action="process.php">
<ul>
<?php while($row = mysqli_fetch_array($results)) { ?>
<li> <input type="radio"  name="choice" value = <?php echo $row['id']; ?> /><?php echo $row['text']; } ?> </li>

</ul>

<input name="submit" type="submit" value="submit">
<input type="hidden" name = "number" value= "<?php echo $number ?>"




</body>

</html>