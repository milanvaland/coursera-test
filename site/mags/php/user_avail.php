<?php
	include 'db.php';
	if(isset($_POST['regUser'])){
		$username = mysql_real_escape_string($_POST['regUser']);
		$stmt = $db->prepare("SELECT username from users WHERE username = :username");
		$stmt->bindParam('username',$username);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 0)
		{
			echo "avail";
		}
		else{
			echo "notAvail";
		}	
	}
?>  