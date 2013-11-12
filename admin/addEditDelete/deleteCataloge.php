<?php
require '../connect_db.php';
if (!isset($_REQUEST['catalogeTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$catalogeID = $_REQUEST['catalogeTranID'];
	$queryDeleteC = "Delete from film_cataloge where film_cataloge_id = $catalogeID";
	$resultDeleteC = mysql_query($queryDeleteC);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=5');
}
?>