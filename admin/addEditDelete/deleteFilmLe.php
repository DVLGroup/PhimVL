<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmLeTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$filmLeID = $_REQUEST['filmLeTranID'];
	$queryDeleteFL = "Delete from film_le where film_le_id = $filmLeID";
	$resultDeleteFL = mysql_query($queryDeleteFL);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=8');
}
?>