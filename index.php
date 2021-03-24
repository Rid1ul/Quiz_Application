<?php include "database.php"; ?>
<?php
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
<h2>Test your knowledge<h2>
<p>This is a multiple choice quiz</p>

<ul>
<li><b>Number of questions:</b> <?php echo $total ; ?></li>
<li><b>Type:</b> Multiple choice</li>
<li><b>Estimated time:</b> <?php echo $total*1; ?> minutes</li>
</ul>

<a href = "question.php?n=1">Start Quiz</a>
</body>

</html>



<?php 
echo "Quiz Application";
?>