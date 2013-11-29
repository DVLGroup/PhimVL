<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Xác Nhận Thêm</title>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<link href="../css/docs.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/bootstrap.js" type="text/javascript"></script>

	</head>
	<body>
		<?php
		require '../connect_db.php';

		$filmBoName = $_POST['tenFilmBo'];
		$filmBoNameVi = $_POST['tenFilmBoVi'];
		$soTap = $_POST['soTap'];
		$namSX = $_POST['namSX'];
		$theLoai1 = $_POST['theLoai1'];
		$theLoai2 = $_POST['theLoai2'];
		$theLoai3 = $_POST['theLoai3'];
		$nuocSX = $_POST['nuocSX'];
		$nhaSX = $_POST['nhaSX'];
		$noiDung = $_POST['noiDung'];
		$avatar = $_FILES['avatar']['name'];
		$cover = $_FILES['cover']['name'];
		$tenDaoDien = $_POST['tenDaoDien'];
		$tenDienVien = $_POST['tenDienVien'];
		if ($filmBoName != null && $filmBoNameVi != null && $soTap != null && $namSX != null && $theLoai1 != null && $theLoai2 != null && $theLoai3 != null && $nuocSX != null && $nhaSX != null  && $avatar != null && $cover != null && $tenDaoDien != null && $tenDienVien != null) {
		$sql = "INSERT INTO `film_bo`(`film_bo_name`, `film_bo_name_vi`, `film_bo_sotap`, `film_bo_namsx`,
		`film_bo_cataloge_id_first`, `film_bo_cataloge_id_second`, `film_bo_cataloge_id_third`, `film_bo_country_id`,
		`film_bo_nhasx_id`, `film_bo_content`, `film_bo_avatar`, `film_bo_cover`, `film_bo_daodien`, `film_bo_dienvien`,
		`film_bo_postdate`, `film_bo_viewed`, `film_bo_rate`)
		VALUES ('$filmBoName','$filmBoNameVi',$soTap,$namSX,$theLoai1,$theLoai2,$theLoai3,
		'$nuocSX','$nhaSX','$noiDung','$avatar','$cover','$tenDaoDien','$tenDienVien',
		CURRENT_DATE(),0,0)";

		if (mysql_query($sql)) {
			if($_FILES['cover']['name']!=null&&$_FILES['avatar']['name']){
				$cover = $_FILES['cover']['name'];
				$avatar = $_FILES['avatar']['name'];
				if(!is_file("../upload/hinhPhimCover/$cover"))
				{
					move_uploaded_file($_FILES['cover']['tmp_name'], "../upload/hinhPhimCover/".$_FILES['cover']['name']);
				}
				if(!is_file("../upload/hinhPhimAvatar/$avatar"))
				{
					move_uploaded_file($_FILES['avatar']['tmp_name'], "../upload/hinhPhimAvatar/".$_FILES['avatar']['name']);
				}
			}
		?>
		<div class="container">
			<form method="GET" class="form-horizontal" action="../index-admin.php">
				<div class="form-group">
					<div class="row well">
						<div class="col-md-8 col-md-offset-2">
							<div class="alert alert-success">
								<p class="text-center">
									Thêm Thành Công!
								</p>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-5">
							<input type="hidden" name="changePage" value="7" />
							<button class="btn btn-info btn-block" type="submit" >
								Trở Về
							</button>
						</div>

					</div>
				</div>
			</form

		</div>
		<?php
		mysql_close($link);
		} else {
		?>
		<div class="container">
			<form method="GET" action="../index-admin.php" class="form-horizontal">
				<div class="form-group">
					<div class="row well">
						<div class="col-md-8 col-md-offset-2">
							<div class="alert alert-danger">
								<p class="text-center">
									Thêm Không Thành Công!
								</p>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-5">
							<input type="hidden" name="changePage" value="7" />
							<button class="btn btn-info btn-block" type="submit" >
								Trở Về
							</button>
						</div>
					</div>
				</div>
			</form>

		</div>
		<?php
		mysql_close($link);
		}
		}
		else
		header('Location: ../index-admin.php');
		?>
	</body>
</html>