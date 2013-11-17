<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmLeTranID']) || !isset($_REQUEST['filmLeTranName']) ||!isset($_REQUEST['linkPhim']) || !isset($_REQUEST['tenFilmLeVi']) || !isset($_REQUEST['namSX']) || !isset($_REQUEST['theLoai1']) || !isset($_REQUEST['theLoai2']) || !isset($_REQUEST['theLoai3']) || !isset($_REQUEST['nuocSX']) || !isset($_REQUEST['nhaSX']) || !isset($_REQUEST['noiDung']) || !isset($_REQUEST['tenDaoDien']) || !isset($_REQUEST['tenDienVien'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditFilmLe = "UPDATE `film_le` SET 
	`film_le_name`='".$_REQUEST['filmLeTranName']."',`film_le_name_vi`='".$_REQUEST['tenFilmLeVi']."',`film_le_link`='".$_REQUEST['linkPhim']."',
	`film_le_namsx`=".$_REQUEST['namSX'].",`film_le_cataloge_id_first`=".$_REQUEST['theLoai1'].",
	`film_le_cataloge_id_second`=".$_REQUEST['theLoai2'].",`film_le_cataloge_id_third`=".$_REQUEST['theLoai3'].",
	`film_le_country_id`=".$_REQUEST['nuocSX'].",`film_le_nhasx_id`=".$_REQUEST['nhaSX'].",`film_le_content`='".$_REQUEST['noiDung']."',
	`film_le_daodien`='".$_REQUEST['tenDaoDien']."',
	`film_le_dienvien`='".$_REQUEST['tenDienVien']."' WHERE `film_le_id`=".$_REQUEST['filmLeTranID'];
	$resultEditFilmLe = mysql_query($queryEditFilmLe);
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=8');
}
?>