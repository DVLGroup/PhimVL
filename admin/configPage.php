<!DOCTYPE htHTML>
<html>
	<head>
		<link href="css/docs.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/messages_vi.js"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			$(document).ready(function() {
				$("#management").validate({
					errorElement : "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
					rules : {
						rePassword : {
							equalTo : "#password" // So sánh trường repassword với trường có id là password
						},
					}
				});
				$(function() {
					$(window).scroll(function() {
						if ($(this).scrollTop() !== 0) {
							$('#bttop').fadeIn();
						} else {
							$('#bttop').fadeOut().animate({
								bottom : "60px",
								right : "10px"
							});
						}
					});
					$('#bttop').click(function() {
						$('body,html').animate({
							scrollTop : 0
						}, 800);
						$('#bttop').animate({
							bottom : "700px",
							right : "250px"
						}, 800);
					});
				});
			});
		</script>
		<?php
		session_start();
		?>
	</head>
	<body style="background-color: #222222">
		<div class="btn btn-lg" id="bttop"><img width="65" height="32" src="images/batmanToTop.png" />
		</div>
		<div class="container fluid">
			<?php
			if(isset($_REQUEST['checkConfig']))
			{
			if($_REQUEST['checkConfig']==1){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
				</button>
				<strong>Lỗi! </strong> Mật Khẩu Xác Nhận Sai, Vui Lòng Nhập Lại!
			</div>
			<?php
			}
			}
			?>
			<div class="thumbnail">
				<form action="saveConfig.php" id="management" class="form-horizontal">
					<hr />
					<div class="form-group">
						<div class="alert alert-info col-md-12">
							<p class="lead text-center">
								<strong>Tùy Chỉnh Tài Khoản</strong>
							</p>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-3"> ID Người Quản Trị </label>
						<div class="col-md-6">
							<input type="text" disabled="disabled" class="form-control" value="<?php echo($_SESSION["adminID"]); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"> Email </label>
						<div class="col-md-6">
							<input type="text" disabled="disabled" class="form-control" value="<?php echo($_SESSION["adminLog"]); ?>" />
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-3">Mật Khẩu Mới</label>
						<div class="col-md-6">
							<input type="password" class="form-control required" minlength="8" id="password" name="newPassword" placeholder="Nhập Mật Khẩu Mới"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Lặp Lại Mật Khẩu Mới</label>
						<div class="col-md-6">
							<input type="password" class="form-control required" minlength="8" id="rePassword" name="rePassword" placeholder="Lặp Lại Mật Khẩu Mới"/>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-3">Xác Nhận Mật Khẩu Cũ</label>
						<div class="col-md-6">
							<input type="password" class="form-control required" name="oldPassword" placeholder="Xác Nhận Mật Khẩu Cũ"/>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<a href="index-admin.php" class="btn btn-info" >Trở Về</a>
							<button type="submit" class="btn btn-default">
								Lưu Tùy Chọn
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>
