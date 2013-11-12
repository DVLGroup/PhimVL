<?php
require '../connect_db.php';
if (!isset($_REQUEST['countryTranID']) || !isset($_REQUEST['countryTranName'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditCountry = "update film_country set film_country_name = '" . $_REQUEST['countryTranName'] . "' where film_country_id = " . $_REQUEST['countryTranID'];
	$resultEditCountry = mysql_query($queryEditCountry);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=3');
}
?>