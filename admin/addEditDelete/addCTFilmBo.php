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

		$cTFilmBoID = $_POST['cTFilmBoID'];
		$cTFilmBoTap = $_POST['cTFilmBoTap'];
		$cTFilmBoLink = $_POST['cTFilmBoLink'];
		$filmSoTap;
		if ($cTFilmBoID != null && $cTFilmBoTap != null && $cTFilmBoLink != null) {
			$sql = "INSERT INTO `film_bo_ct`(`film_bo_ct_id`, `film_bo_ct_tap`, `film_bo_ct_link`) VALUES (".$cTFilmBoID.",".$cTFilmBoTap.",'".$cTFilmBoLink."')";
			$sqlSelect = "SELECT film_bo_sotap from film_bo where film_bo_id = ".$cTFilmBoID."";
			$resultSelect = mysql_query($sqlSelect);
			while($rowSL = mysql_fetch_array($resultSelect)){
				$filmSoTap = $rowSL['0'];
			}
			// echo($filmSoTap+1);
			if (mysql_query($sql)) {
				$sqlUpdate = "Update film_bo set film_bo_sotap = ".($filmSoTap+1)." where film_bo_id = ".$cTFilmBoID."";
				mysql_query($sqlUpdate);
				// header('"Location: http://theos.in/"localhost/phptest/admin/index-admin.php?changePage=1');
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
							<input type="hidden" name="changePage" value="9" />
							<input type="hidden" name="filmBoID" value="<?php echo($cTFilmBoID);?>" />
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
			unlink("../upload/$cTFilmBoLink");
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
							<input type="hidden" name="changePage" value="9" />
							<input type="hidden" name="filmBoID" value="<?php echo($cTFilmBoID);?>" />
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
