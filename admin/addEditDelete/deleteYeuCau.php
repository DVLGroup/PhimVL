<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmYeuCauTranID'])) {
	header('Location: ../index-admin.php');
} else {
	$filmYeuCauID = $_REQUEST['filmYeuCauTranID'];
	echo($filmYeuCauID);
	$queryDeleteFilmYeuCau = "Delete from film_yeucau where film_yeucau_id = $filmYeuCauID";
	$resultDeleteFilmYeuCau = mysql_query($queryDeleteFilmYeuCau);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=6');
}
?>