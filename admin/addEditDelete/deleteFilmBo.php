<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmBoTranID']) || !isset($_REQUEST['tranCover']) || !isset($_REQUEST['tranAvatar'])) {
	header('Location: ../index-admin.php');
} else {
	$filmBoID = $_REQUEST['filmBoTranID'];
	$queryDeleteFB = "Delete from film_bo where film_bo_id = $filmBoID";
	$resultDeleteFB = mysql_query($queryDeleteFB);
	mysql_close($link);
	// $cover = $_REQUEST['tranCover'];
	// $avatar = $_REQUEST['tranAvatar'];
	// unlink("../upload/hinhPhimCover/$cover");
	// unlink("../upload/hinhPhimAvatar/$avatar");
	header('Location: ../index-admin.php?changePage=7');
}
?>