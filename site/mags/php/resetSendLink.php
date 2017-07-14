<?php
	include 'db.php';
	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))
	{
		$username = mysql_real_escape_string($_POST['user']);
		$email = mysql_real_escape_string($_POST['email']);
		$stmt = $db->prepare('SELECT username FROM users WHERE username = :username AND email = :email');
		$stmt->bindParam('username','$username');
		$stmt->bindParam('email','$email');
		$stmt->exexute();
		if($stmt->rowCount() == 0)
		{
			echo "invalid";
		}
		else{}
	}
	else {
		echo "invalid";
	}
?> 