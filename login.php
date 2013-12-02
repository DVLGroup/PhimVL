<?php

	include 'core/Connect.php';
	
   if(isset($_POST['login'])){
		//Lấy uemail, upass và biến đếm kết quả
		$uemail = $_POST['uemail'];
		$upass = $_POST['upass'];
		$hash_pass = sha1($upass);
		//Phân quyền
		$level = '';
		$dem = 0;
		$userID = '';
		//Tạo câu lệnh query
		$query_login = "SELECT * FROM user WHERE user_email ='$uemail' AND user_password = '$hash_pass'";
		//Thực hiện câu lệnh 
		$rs = mysql_query($query_login, $my_connect);
		//Lấy kết quả sau khi thực hiện
		while ($row = mysql_fetch_array($rs)) {
			$dem += 1;
			//Phân quyền
			if($row['user_level_id'] == '1'){
				$level = 'admin';
			}
			if($row['user_level_id'] == '2'){
				$level = 'user';
			}
			$userID = $row['user_id'];	
			mysql_close($my_connect);
		}
		//Kiểm tra xem có 1 kết quả trả về hay không?
		////Nếu có thì xuất ra login success
		////Nếu không có thì xuất ra login error
		if($dem == 1){
			sleep(1);
			session_start();
			if($level == 'admin'){
				$_SESSION['admin'] = $uemail;
			}
			if($level == 'user'){
				$_SESSION['user'] = $uemail;
			}
			$_SESSION['userID'] = $userID;
			$rs = array('uemail' => $uemail
						,'level' => $level);
			
			
			echo json_encode($rs);
		}
		else {
			echo "login error";
			die;
		}
	}

	if(isset($_REQUEST['logout'])){
		session_start();
		session_destroy();
		echo "success";
	}
