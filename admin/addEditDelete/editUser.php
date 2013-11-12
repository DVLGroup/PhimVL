<?php
require '../connect_db.php';

if (!isset($_REQUEST['userIDEdit']) || !isset($_REQUEST['userLevelEdit']) || !isset($_REQUEST['passwordEdit'])) {
	header('Location: ../index-admin.php');
} else {
	echo($_REQUEST['userIDEdit']);
	//echo($_REQUEST['emailEdit']);
	echo($_REQUEST['userLevelEdit']);
	echo($_REQUEST['passwordEdit']);
	$queryEditUser = "update user set user_password = '" . $_REQUEST['passwordEdit'] . "',user_level_id = '" . $_REQUEST['userLevelEdit'] . "'where user_id = " . $_REQUEST['userIDEdit'];
	$resultEditUser = mysql_query($queryEditUser);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=1');
}
?>