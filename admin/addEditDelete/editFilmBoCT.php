<?php
require '../connect_db.php';
if (!isset($_REQUEST['cTFilmBoTap'])||!isset($_REQUEST['cTFilmBoTranID'])||!isset($_REQUEST['cTFilmBoTranTap']) || !isset($_REQUEST['cTFilmBoTranLink'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditCT = "update film_bo_ct set film_bo_ct_tap = '" . $_REQUEST['cTFilmBoTranTap'] . "',film_bo_ct_link = '".$_REQUEST['cTFilmBoTranLink']."'
	 where film_bo_ct_id = " . $_REQUEST['cTFilmBoTranID'] ." and film_bo_ct_tap =".$_REQUEST['cTFilmBoTap']."";
	$resultEditCT = mysql_query($queryEditCT);
	mysql_close($link);
	header("Location: ../index-admin.php?changePage=9&filmBoID=".$_REQUEST['cTFilmBoTranID']."");
}
?>