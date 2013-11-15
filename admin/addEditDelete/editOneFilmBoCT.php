<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<?php
			if (!isset($_REQUEST['cTFilmBoID'])||!isset($_REQUEST['cTFilmBoName'])||!isset($_REQUEST['cTFilmBoTap'])) {
				header('Location: ../index-admin.php');
			}
		?>
		<?php
		require '../include/headPage.php';

		$cTFilmBoNameEdit = $_REQUEST['cTFilmBoName'];
		$cTFilmBoEdit = $_REQUEST['cTFilmBoID'];
		$cTFilmBoTapEdit = $_REQUEST['cTFilmBoTap'];
		$cTFilmBoLinkEdit;
		require '../connect_db.php';
		$querySelectCTFilmBo = "select * from film_bo_ct where film_bo_ct_id = '$cTFilmBoEdit' and film_bo_ct_tap = '$cTFilmBoTapEdit'";
		$resultSelectCTFilmBo = mysql_query($querySelectCTFilmBo);
		while ($row = mysql_fetch_array($resultSelectCTFilmBo)) {
			$cTFilmBoLinkEdit = $row['2'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editFilmBoCT.php" class="form-horizontal" id="management">
					<input type="hidden" name="cTFilmBoTranID" value="<?php echo($cTFilmBoEdit); ?>" />
					<input type="hidden" name="cTFilmBoTap" value="<?php echo($cTFilmBoTapEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tập</label>
						<div class="col-md-8">
							<input type="text" name="cTFilmBoTranTap" class="form-control digits required"  value="<?php echo($cTFilmBoTapEdit); ?>" placeholder="Nhập Tập Phim"  />
						</div>
						<div class="col-md-offset-2"></div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-2">Link Phim</label>
						<div class="col-md-8">
							<input type="text" readonly="readonly" name="cTFilmBoTranLink" class="form-control url required" value="<?php echo($cTFilmBoLinkEdit); ?>" placeholder="Nhập Link Phim"  />
						</div>
						<div class="col-md-offset-2"></div>
					</div>									
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Phim Có ID là: <strong><?php echo($cTFilmBoEdit); ?></strong> (<strong><?php echo($cTFilmBoNameEdit); ?>, tập <strong><?php echo($cTFilmBoTapEdit); ?></strong>) Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=9&filmBoID=<?php echo($cTFilmBoEdit); ?>" class="btn btn-info text-center">Không</a>
							</div>

							<div class="btn-group">
								
								<button class="btn btn-default" type="submit">Có</button>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>