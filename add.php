<!DOCTYPE html>
<html>
<head>
<title>Online Quiz</title>
</head>

<body>

<h2> Add a question </h2>

<form method="post" action = "add.php">

<p>
<label>Question Number: </label>
<input type="number" name="question_number"> <br>
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
<input type="text" name="Choice2"> <br>
</p>

<p>
<label>Choice #3: </label>
<input type="text" name="choic3"> <br>
</p>

<p>
<label>Choice #4 </label>
<input type="text" name="Choice4"> <br>
</p>

<p>
<label>Choice #5 </label>
<input type="text" name="Choice5"> <br>
</p>

<p>
<label>Correct hoice number: </label>
<input type="number" name="correct_choice"> <br>
</p>

<input type="submit" name="submit" value="submit">

</form>




</body>

