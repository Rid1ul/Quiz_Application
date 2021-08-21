<?php session_start(); ?>

<!DOCTYPE html>

<html>

    <head>
        <h2>Online Quiz</h2>
		<h3>You have completed the quiz ! </h3>
    </head>
	
	<body>
	     <p>Your score: <?php echo $_SESSION['score']; ?> </p>
	
	    <?php
		session_unset();
		session_destroy();
		
		?>
		
		<a href="question.php?n=1">Take again</a>
	
	</body>


</html>