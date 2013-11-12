<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<?php
			if (!isset($_REQUEST['userLvlId'])) {
				header('Location: ../index-admin.php');
			}
		?>
		<?php
		require '../include/headPage.php';

		$userLvlNameEdit;
		$userLvlIdEdit = $_REQUEST['userLvlId'];
		require '../connect_db.php';
		$querySelectUserLvl = "select * from user_level where user_level_id = $userLvlIdEdit";
		$resultSelectUserLvl = mysql_query($querySelectUserLvl);
		while ($row = mysql_fetch_array($resultSelectUserLvl)) {
			$userLvlNameEdit = $row['1'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editUserLevel.php" class="form-horizontal" id="management">
					<input type="hidden" name="userIdLvlEdit" value="<?php echo($userLvlIdEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tên Nhóm User</label>
						<div class="col-md-8">
							<input type="text" name="userLvlName" class="form-control required" minlength="3" value="<?php echo($userLvlNameEdit); ?>" placeholder="Nhập Tên Nhóm"  />
						</div>
						<div class="col-md-offset-2"></div>

					</div>									
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Nhóm User Có ID là: <strong><?php echo($userLvlIdEdit); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=2" class="btn btn-info text-center">Không</a>
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