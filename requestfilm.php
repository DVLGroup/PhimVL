<?php
	include 'core/Connect.php';
    if(isset($_POST['requestFilm'])){
    	sleep(2);
		session_start();
    	$uid = $_SESSION['userID'];
		$fname = $_POST['fname'];
		$fnamevi = $_POST['fnamevi'];
		$fnamsx = $_POST['fnamsx'];
		$now = getdate();
		$pdate = $now['year'].'-'.$now['mon'].'-'.$now['mday'];
		$sql = "INSERT INTO `film_yeucau`(`film_yeucau_user_id`, `film_yeucau_name`, `film_yeucau_name_vi`, `film_yeucau_namsx`, `film_yeucau_postdate`)"
		." VALUES('$uid', '$fname', '$fnamevi', '$fnamsx', '$pdate')";
		$rs = mysql_query($sql, $my_connect);
		if($rs)
			echo "success";
		else {
			echo "error";
		}
		mysql_close($my_connect);
    }
?>