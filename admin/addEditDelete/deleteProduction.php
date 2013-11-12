<?php
require '../connect_db.php';
if (!isset($_REQUEST['productionTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$productionID = $_REQUEST['productionTranID'];
	$queryDeleteP = "Delete from film_nhasx where film_nhasx_id = $productionID";
	$resultDeleteP = mysql_query($queryDeleteP);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=4');
}
?>