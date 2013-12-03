<?php
	include 'core/Connect.php';
	if(isset($_POST['changePass'])){
		sleep(2);
		$uemail = $_POST['uemail'];
		$upass = $_POST['upass'];
		$newpass = $_POST['newpass'];
		//ma hoa
		$hash_upass = sha1($upass);
		$hash_newpass = sha1($newpass);
		//$query = "UPDATE user SET user_password = '123' WHERE user_password ='$upass' ";
		$query = "UPDATE `user` SET `user_password` ='$hash_newpass' WHERE `user_email` ='$uemail' AND `user_password` ='$hash_upass'";
		$rs = mysql_query($query, $my_connect);
		
		if(mysql_affected_rows()>0){
			echo "success";
		}
		else {
			echo "Error";
		}
		mysql_close($my_connect);
	}
