<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<?php
			if (!isset($_REQUEST['catalogeID'])) {
				header('Location: ../index-admin.php');
			}
		?>
		<?php
		require '../include/headPage.php';

		$catalogeNameEdit;
		$catalogeEdit = $_REQUEST['catalogeID'];
		require '../connect_db.php';
		$querySelectCataloge = "select * from film_cataloge where film_cataloge_id = $catalogeEdit";
		$resultSelectCataloge = mysql_query($querySelectCataloge);
		while ($row = mysql_fetch_array($resultSelectCataloge)) {
			$catalogeNameEdit = $row['1'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editCataloge.php" class="form-horizontal" id="management">
					<input type="hidden" name="catalogeTranID" value="<?php echo($catalogeEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tên Thể Loại</label>
						<div class="col-md-8">
							<input type="text" name="catalogeTranName" class="form-control required" minlength="3" value="<?php echo($catalogeNameEdit); ?>" placeholder="Nhập Tên Thể Loại"  />
						</div>
						<div class="col-md-offset-2"></div>

					</div>									
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Thể Loại Có ID là: <strong><?php echo($catalogeEdit); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=5" class="btn btn-info text-center">Không</a>
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