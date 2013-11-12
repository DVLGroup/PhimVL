<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Xác Nhận Xóa</title>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<link href="../css/docs.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/bootstrap.js" type="text/javascript"></script>
		<?php
			if (!isset($_REQUEST['cTFilmBoID'])) {
				header('Location: ../index-admin.php');
			}
		?>
	</head>
	<body>
		<div class="container">
			<form method="GET" class="form-horizontal" action="../index-admin.php">
				<div class="form-group">
					<div class="row well">
						<div class="col-md-8 col-md-offset-2">
							<div class="alert alert-warning">
								<p class="text-center">
									<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Xóa Phim Có ID là: <strong><?php echo($_REQUEST['cTFilmBoID']); ?></strong> (<strong><?php echo($_REQUEST['cTFilmBoName']); ?>, tập <strong><?php echo($_REQUEST['cTFilmBoTap']); ?></strong>) Không?
								</p>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-5">
							<input type="hidden" name="changePage" value="9" />
							<input type="hidden" name="filmBoID" value="<?php echo($_REQUEST['cTFilmBoID'])?>" />
							<a href="../addEditDelete/deleteFilmBoCT.php?cTFilmBoTranID=<?php echo($_REQUEST['cTFilmBoID']); ?>&cTFilmBoTranTap=<?php echo($_REQUEST['cTFilmBoTap']); ?>" class="btn btn-default btn-block">Có</a>
							<button class="btn btn-info btn-block" type="submit" >
								Không
							</button>
						</div>

					</div>
				</div>
			</form
	</body>
</html>