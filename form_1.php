<?php
include ('includes/db.php');
?>

<form method = "_POST" action = "/form1_handle.php">
	<input type = 'text' placeholder = "Your login" name = "login">
	<input type = 'text' placeholder = "Your password" name = "password">
	<hr>
	<input type = 'submit' value = "Send">
</form>
