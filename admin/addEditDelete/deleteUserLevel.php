<?php
require '../connect_db.php';
if (!isset($_REQUEST['userLvlTranId'])) {
	header('Location: ../index-admin.php');
} else {
	$userLvlId = $_REQUEST['userLvlTranId'];
	echo($userID);
	$queryDeleteLvlUser = "Delete from user_level where user_level_id = $userLvlId";
	$resultDeleteLvlUser = mysql_query($queryDeleteLvlUser);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=2');
}
?>