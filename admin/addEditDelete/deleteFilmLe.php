<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmLeTranID'])||!isset($_REQUEST['filmLeLink'])||!isset($_REQUEST['tranCover'])||!isset($_REQUEST['tranAvatar'])) {
	header('Location: ../index-admin.php');
} else {
	$filmLeID = $_REQUEST['filmLeTranID'];
	$queryDeleteFL = "Delete from film_le where film_le_id = $filmLeID";
	$resultDeleteFL = mysql_query($queryDeleteFL);
	mysql_close($link);
	$fileName = $_REQUEST['filmLeLink'];
	// $cover = $_REQUEST['tranCover'];
	// $avatar = $_REQUEST['tranAvatar'];
	unlink("../upload/$fileName");
	// unlink("../upload/hinhPhimCover/$cover");
	// unlink("../upload/hinhPhimAvatar/$avatar");
	header('Location: ../index-admin.php?changePage=8');
}
?>