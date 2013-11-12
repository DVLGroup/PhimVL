<!DOCTYPE HTML>
<html lang="en">
	<head>
		<link href="css/bootstrap-RC2.css" rel="stylesheet" type="text/css" />
		<title>Quản Lý</title>
		<link href="css/docs.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/messages_vi.js"></script>
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
			}); 
		</script>
		<?php
		$checkLogin = 0;
		?>
		<?php
		//require 'include/headPage.php';
		require 'connect_db.php';
		if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
			$emailLog = $_POST['emailLogin'];
			$passLog = $_POST['passwordLogin'];
			$queryLog = "SELECT * FROM user WHERE user_level_id = '1' and user_email = '" . $emailLog . "' and user_password = '" . $passLog . "'";
			$resultLog = mysql_query($queryLog);
			mysql_close($link);
			$checkLogin = 1;

			while ($row = mysql_fetch_array($resultLog)) {
				session_start();
				$_SESSION["adminLog"] = $emailLog;
				$_SESSION["adminID"] = $row['0'];
				$_SESSION["adminPass"] = $row['2'];
				$checkLogin = 2;
			}
			if($checkLogin == 2)
				header('Location: index-admin.php');
		} else {
			session_start();
			if (isset($_SESSION["adminLog"])) {
				header('Location: index-admin.php');
			}
		}
		?>
	</head>
	<body>
		<div class="container">
			<?php
			if($checkLogin == 1)
			{
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
				</button>
				<strong>Cảnh Báo! </strong> Email Hoặc Mật Khẩu Của Bạn Có Thể Bị Sai, <strong>Bạn Còn 10 Lần Nhập Lại!</strong>
			</div>
			<?php
			}
			?>

			<div class="page-header">
				<h2 class="text-center thumbnail">Đăng Nhập Quản Trị Viên</h2>
			</div>
			<div class="well">
				<form method="post" class="form-horizontal" id="management">

					<div class="form-group">
						<label class="control-label col-md-3">Email</label>
						<div class="col-md-6">
							<input type="text" name="emailLogin" class="form-control required email" value="" placeholder="Nhập Email"  />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Mật Khẩu</label>
						<div class="col-md-6">
							<input type="password" name="passwordLogin" class="form-control required" value="" placeholder="Nhập Mật Khẩu"  />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<div class="checkbox">
								<label>
									<input type="checkbox">
									Remember me </label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="submit" class="btn btn-info">
								Đăng Nhập
							</button>
							<button type="reset" class="btn btn-warning">
								Làm Tươi
							</button>
						</div>
					</div>

				</form>
			</div>
			<hr />
			<div class="thumbnail">
				<br />
				<br />
			</div>
		</div>
	</body>
</html>