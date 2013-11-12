<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<?php
			if (!isset($_REQUEST['productionID'])) {
				header('Location: ../index-admin.php');
			}
		?>
		<?php
		require '../include/headPage.php';

		$productionNameEdit;
		$productionEdit = $_REQUEST['productionID'];
		require '../connect_db.php';
		$querySelectProduction = "select * from film_nhasx where film_nhasx_id = $productionEdit";
		$resultSelectProduction = mysql_query($querySelectProduction);
		while ($row = mysql_fetch_array($resultSelectProduction)) {
			$productionNameEdit = $row['1'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editProduction.php" class="form-horizontal" id="management">
					<input type="hidden" name="productionTranID" value="<?php echo($productionEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tên Nước</label>
						<div class="col-md-8">
							<input type="text" name="productionTranName" class="form-control required" minlength="3" value="<?php echo($productionNameEdit); ?>" placeholder="Nhập Tên Nhà Sản Xuất"  />
						</div>
						<div class="col-md-offset-2"></div>

					</div>									
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Nhà Sản Xuất Có ID là: <strong><?php echo($productionEdit); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=4" class="btn btn-info text-center">Không</a>
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