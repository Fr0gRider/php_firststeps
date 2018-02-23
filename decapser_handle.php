<?php
include ('my_funcs.php');
$text = $_GET['text'];
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles/style_decapser.css">
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form>
			<textarea name = "Your text"> <?php jcaps($text) ?>
			</textarea>
		</form>
	</body>
</html>





