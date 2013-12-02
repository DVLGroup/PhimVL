<?php
    include 'core/Connect.php';
	
	if(isset($_POST['checkEmail'])){
		$uemail= $_POST['uemail'];
		
		$query_checkEmail = "SELECT * FROM user WHERE user_email = '$uemail'";
		$rs = mysql_query($query_checkEmail,$my_connect);
		while($rw = mysql_fetch_array($rs)){
			if($rw['user_email'] == $uemail){
				echo "emailExist";
				return;
			}
		}
		echo "noEmail";
		return;
	}
	
	else if(isset($_POST['signup'])){
		sleep(2);
		$uemail = $_POST['uemail'];
		$upassword = $_POST['upassword'];
		$hash_pass = sha1($upassword);
		$uLevel = '2';
		$sql = "INSERT INTO `user`(`user_email`, `user_password`, `user_level_id`) VALUES ('$uemail','$hash_pass','$uLevel')";
		//$query_signup = "INSERT INTO user VALUES('3', '$uemail', '$hash_pass', '2')";
		
		$rs = mysql_query($sql, $my_connect);
		
		session_start();
		$_SESSION['user'] = $uemail;
		
		echo "success";
		return;
	}
	else {
		echo "false";
		return;
	}
	
?>
