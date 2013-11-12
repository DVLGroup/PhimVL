<?php
require '../connect_db.php';
if (!isset($_REQUEST['userIdLvlEdit'])||!isset($_REQUEST['userLvlName'])) {
	header('Location: ../index-admin.php');
} else {
	echo($_REQUEST['userIdLvlEdit']);
	echo($_REQUEST['userLvlName']);

	$queryEditUserLvl = "update user_level set user_level_name = '" . $_REQUEST['userLvlName'] . "' where user_level_id = " . $_REQUEST['userIdLvlEdit'];
	$resultEditUserLvl = mysql_query($queryEditUserLvl);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=2');
}
?>