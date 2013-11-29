<?php
require '../connect_db.php';
if (!isset($_REQUEST['filmBoTranID']) || !isset($_REQUEST['filmBoTranName']) || !isset($_REQUEST['tenFilmBoVi']) || !isset($_REQUEST['soTap']) || !isset($_REQUEST['namSX']) || !isset($_REQUEST['theLoai1']) || !isset($_REQUEST['theLoai2']) || !isset($_REQUEST['theLoai3']) || !isset($_REQUEST['nuocSX']) || !isset($_REQUEST['nhaSX']) || !isset($_REQUEST['noiDung']) || !isset($_REQUEST['avatar']) || !isset($_REQUEST['cover']) || !isset($_REQUEST['tenDaoDien']) || !isset($_REQUEST['tenDienVien'])) {
	header('Location: ../index-admin.php');
} else {
	$queryEditFilmBo = "UPDATE `film_bo` SET 
	`film_bo_name`='".$_REQUEST['filmBoTranName']."',`film_bo_name_vi`='".$_REQUEST['tenFilmBoVi']."',`film_bo_sotap`='".$_REQUEST['soTap']."',
	`film_bo_namsx`=".$_REQUEST['namSX'].",`film_bo_cataloge_id_first`=".$_REQUEST['theLoai1'].",
	`film_bo_cataloge_id_second`=".$_REQUEST['theLoai2'].",`film_bo_cataloge_id_third`=".$_REQUEST['theLoai3'].",
	`film_bo_country_id`=".$_REQUEST['nuocSX'].",`film_bo_nhasx_id`=".$_REQUEST['nhaSX'].",`film_bo_content`='".$_REQUEST['noiDung']."',
	`film_bo_avatar`='".$_REQUEST['avatar']."',`film_bo_cover`='".$_REQUEST['cover']."',`film_bo_daodien`='".$_REQUEST['tenDaoDien']."',
	`film_bo_dienvien`='".$_REQUEST['tenDienVien']."' WHERE `film_bo_id`=".$_REQUEST['filmBoTranID'];
	$resultEditFilmBo = mysql_query($queryEditFilmBo);
	if($resultEditFilmBo){
		if($_FILES['coverNew']['name']!=null){
				$cover = $_FILES['coverNew']['name'];
				echo("upload thanh cong!");
				if(!is_file("../upload/hinhPhimCover/$cover"))
				{
					move_uploaded_file($_FILES['coverNew']['tmp_name'], "../upload/hinhPhimCover/".$_FILES['coverNew']['name']);
				}
			}
		if($_FILES['avatarNew']['name']!=null){
				
				$avatar = $_FILES['avatarNew']['name'];
				if(!is_file("../upload/hinhPhimAvatar/$avatar"))
				{
					move_uploaded_file($_FILES['avatarNew']['tmp_name'], "../upload/hinhPhimAvatar/".$_FILES['avatarNew']['name']);
				}
			}
	}
	mysql_close($link);
	header('Location: ../index-admin.php?changePage=7');
}
?>