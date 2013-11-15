<?php
require '../connect_db.php';
if (!isset($_REQUEST['cTFilmBoTranID']) || !isset($_REQUEST['cTFilmBoTranTap'])|| !isset($_REQUEST['cTFilmBoTranLink'])) {
	header('Location: ../index-admin.php');
} else {
	$cTFilmBoID = $_REQUEST['cTFilmBoTranID'];
	$cTFilmBoTap = $_REQUEST['cTFilmBoTranTap'];
	$cTFilmBoLink = $_REQUEST['cTFilmBoTranLink'];
	$filmSoTap;
	$querySelectTap = "SELECT film_bo_sotap from film_bo where film_bo_id = " . $cTFilmBoID . "";
	$resultSelectTap = mysql_query($querySelectTap);
	while ($rowSL = mysql_fetch_array($resultSelectTap)) {
		$filmSoTap = $rowSL['0'];
	}
	$queryDeleteCT = "Delete from film_bo_ct where film_bo_ct_id = $cTFilmBoID and film_bo_ct_tap = $cTFilmBoTap";
	$resultDeleteCT = mysql_query($queryDeleteCT);
	$queryUpdateFB = "Update film_bo set film_bo_sotap = ".($filmSoTap-1)." where film_bo_id = ".$cTFilmBoID."";
	$resultUpdateFB = mysql_query($queryUpdateFB);
	mysql_close($link);
	unlink("../upload/$cTFilmBoLink");
	header('Location: ../index-admin.php?changePage=9&filmBoID='.$cTFilmBoID);
}
?>