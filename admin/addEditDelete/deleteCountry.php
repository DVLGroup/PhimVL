<?php
require '../connect_db.php';
if (!isset($_REQUEST['countryTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$countryID = $_REQUEST['countryTranID'];
	$queryDeleteC = "Delete from film_country where film_country_id = $countryID";
	$resultDeleteC = mysql_query($queryDeleteC);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=3');
}
?>