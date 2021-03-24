<?php include("database.php") ?>

<?php
$number  = (int) $_GET['n'];


//Fetch question . . . .
$query = "SELECT * FROM questions where question_number = '$number' ";

$result = mysqli_query($conn,$query);

$question = mysqli_fetch_array($result);

// Fetch choices

$query2 = "select * from choices where question_number = '$number'";
$results = mysqli_query($conn, $query2);






?>

<!DOCTYPE html>
<html>
<head>
<title>Online Quiz</title>
</head>
<body>
Question 1 of 5
<p><?php echo $question['text']; ?></p>

<form method="post" action="process.php">
<ul>
<?php while($row = mysqli_fetch_array($results)) { ?>
<li> <input type="radio" id="1" name="1" value = <?php echo $row['id']; ?> /><?php echo $row['text']; } ?> </li>

</ul>

<input type="submit" value="submit">




</body>

</html>