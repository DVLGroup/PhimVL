<?php
require '../connect_db.php';
if (!isset($_REQUEST['catalogeTranID'])||!isset($_REQUEST['catalogeTranName'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditCataloge = "update film_cataloge set film_cataloge_name = '" . $_REQUEST['catalogeTranName'] . "' where film_cataloge_id = " . $_REQUEST['catalogeTranID'];
	$resultEditCataloge = mysql_query($queryEditCataloge);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=5');
}
?>