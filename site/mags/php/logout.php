<?php
	#session_resume
	session_start();
	session_destroy();
	header('Location:../pages/LoginPage.php');
?>
