<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmBoTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$filmBoID = $_REQUEST['filmBoTranID'];
	$queryDeleteFB = "Delete from film_bo where film_bo_id = $filmBoID";
	$resultDeleteFB = mysql_query($queryDeleteFB);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=7');
}
?>