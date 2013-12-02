
<?php

	include 'core/Connect.php';
	
	if(isset($_POST['changePass'])){
		$uemail = $_POST['uemail'];
		$upass = $_POST['upass'];
		$newpass = $_POST['newpass'];
		
		$query = "UPDATE user SET user_password = '$newpass' WHERE user_email = '$uemail' AND user_password = '$upass'";
		
		if(mysql_query($query)){
			echo "success";
			return;
		}
		else {
			echo "passError";
		}
	}
	else {
		echo "passError";
		return;
	}
