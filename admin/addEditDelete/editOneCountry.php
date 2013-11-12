<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<?php
			if (!isset($_REQUEST['countryID'])) {
				header('Location: ../index-admin.php');
			}
		?>
		<?php
		require '../include/headPage.php';

		$countryNameEdit;
		$countryEdit = $_REQUEST['countryID'];
		require '../connect_db.php';
		$querySelectCountry = "select * from film_country where film_country_id = $countryEdit";
		$resultSelectCountry = mysql_query($querySelectCountry);
		while ($row = mysql_fetch_array($resultSelectCountry)) {
			$countryNameEdit = $row['1'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editCountry.php" class="form-horizontal" id="management">
					<input type="hidden" name="countryTranID" value="<?php echo($countryEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tên Nước</label>
						<div class="col-md-8">
							<input type="text" name="countryTranName" class="form-control required" minlength="3" value="<?php echo($countryNameEdit); ?>" placeholder="Nhập Tên Nước"  />
						</div>
						<div class="col-md-offset-2"></div>

					</div>									
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Nước Có ID là: <strong><?php echo($countryEdit); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=3" class="btn btn-info text-center">Không</a>
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