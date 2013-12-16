<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<title>Quản Lý</title>

		<link href="../css/docs.css" rel="stylesheet" type="text/css" />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../js/messages_vi.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#management").validate({
					errorElement : "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
                   		rules: {
							rePassword: {
							equalTo: "#password" // So sánh trường repassword với trường có id là password
							},
//                        		min_field: {min: 5}, //Giá trị tối thiểu
//                        		max_field: {max: 10}, //Giá trị tối đa
//                        		range_field: {range: [4, 10]}, //Giá trị trong khoảng từ 4 - 10
//                        		rangelength_field: {rangelength: [4, 10]} //Chiều dài chuỗi trong khoảng từ 4 - 10 ký tự
                   		}
				});
				$("#management-1").validate({
					errorElement : "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
                   		rules: {
							rePassword: {
							equalTo: "#password" // So sánh trường repassword với trường có id là password
							},
                   		}
				});
			}); 
		</script>
		<?php
		//require 'include/headPage.php';
		if (!isset($_REQUEST['userID'])) {
				header('Location: ../index-admin.php');
		}
		$emailEdit;
		$passwordEdit;
		$userLevelEdit;
		$userIDEdit = $_REQUEST['userID'];
		require '../connect_db.php';
		$querySelectUser = "select * from user where user_id = $userIDEdit";
		$resultSelectUser = mysql_query($querySelectUser);
		$querySelectLU = 'select * from user_level order by user_level_id asc';
		$resultSelectLU = mysql_query($querySelectLU);
		while ($row = mysql_fetch_array($resultSelectUser)) {
			$emailEdit = $row['1'];
			$passwordEdit = $row['2'];
			$userLevelEdit=$row['3'];
		}
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editUser.php" class="form-horizontal" id="management">
					<input type="hidden" name="userIDEdit" value="<?php echo($userIDEdit); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Email</label>
						<div class="col-md-8">
							<input disabled="disabled" type="text" name="emailEdit" class="form-control required email" value="<?php echo($emailEdit); ?>" placeholder="Nhập Email"  />
						</div>
						<div class="col-md-offset-2"></div>

					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Mật Khẩu</label>
						<div class="col-md-8">
							<input type="password" name="passwordEdit" class="form-control required" minlength="8" value="<?php echo($passwordEdit); ?>" placeholder="Nhập Mật Khẩu" />
						</div>
						<div class="col-md-offset-2"></div>

					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Nhóm Người Dùng</label>
						<div class="col-md-8">
							<!-- <input type="text" name="userLevel" class="form-control" value="" placeholder="Nhập Nhóm" /> -->
							<select name="userLevelEdit" class="form-control">
								<?php
								while($rowSLU = mysql_fetch_array($resultSelectLU))
								{
									if($rowSLU['0']==$userLevelEdit)
									{
										?>
										<option selected="selected" value="<?php echo($rowSLU['0']); ?>" ><?php echo($rowSLU['1']); ?></option>
										<?php
									}
									else {
										?>
										<option value="<?php echo($rowSLU['0']); ?>" ><?php echo($rowSLU['1']); ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-offset-2"></div>

					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa User Có Email là: <strong><?php echo($emailEdit); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=1" class="btn btn-info text-center">Không</a>
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