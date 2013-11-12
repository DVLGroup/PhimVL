<?php
require '../connect_db.php';
if (!isset($_REQUEST['productionTranID'])||!isset($_REQUEST['productionTranName'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditProduction = "update film_nhasx set film_nhasx_name = '" . $_REQUEST['productionTranName'] . "' where film_nhasx_id = " . $_REQUEST['productionTranID'];
	$resultEditProduction = mysql_query($queryEditProduction);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=4');
}
?>