<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<title>Quản Lý</title>
		<link href="css/docs.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="js/wysibb/theme/default/wbbtheme.css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/wysibb/jquery.wysibb.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/messages_vi.js"></script>
		<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
		<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
		<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				//Setup the sorting for the table with the first column initially sorted ascending
				//and the rows striped using the zebra widget
				$("#tableOne").tablesorter({
					sortList : [[0, 0]],
					widgets : ['zebra']
				});

				//Setup the quickSearch plugin with on onAfter event that first checks to see how
				//many rows are visible in the body of the table. If there are rows still visible
				//call tableSorter functions to update the sorting and then hide the tables footer.
				//Else show the tables footer
				$("#tableOne tbody tr").quicksearch({
					labelText : 'Tìm Kiếm: ',
					attached : '#One',
					position : 'before',
					delay : 100,
					loaderText : 'Loading...',
					onAfter : function() {
						if ($("#tableOne tbody tr:visible").length != 0) {
							$("#tableOne").trigger("update");
							$("#tableOne").trigger("appendCache");
							$("#tableOne tfoot tr").hide();
						} else {
							$("#tableOne tfoot tr").show();
						}
					}
				});

			});
			$(document).ready(function() {
				$("#editor").wysibb();
				$('[data-toggle="tooltip"]').tooltip({
					'placement' : 'top'
				});
			})
			$(document).ready(function() {
				$("#management").validate({
					errorElement : "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
					rules : {
						rePassword : {
							equalTo : "#password" // So sánh trường repassword với trường có id là password
						},
					}
				});

			});
		</script>
		<?php
		require 'connect_db.php';
		?>
		<script type='text/javascript'>
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
				$('#submit').click(function() {
					$('body,html').animate({
						scrollTop : 0
					}, 300);
				});
			});
		</script>
		<?php
		session_start();
		if (isset($_REQUEST["logOut"])) {
			if ($_REQUEST["logOut"] == 1) {
				session_destroy();
				header('Location: loginForm.php');
			}
		}

		if (isset($_SESSION["adminLog"])) {
		} else {
			header('location: loginForm.php');
		}
		?>
	</head>
	<body>
		<div class="btn btn-lg" id="bttop"><img width="65" height="32" src="images/batmanToTop.png" />
		</div>
		<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="nav navbar-brand" href="index-admin.php">PhimVL</a>
				</div>
				<?php

				function echoActiveClassIfRequestMatches($requestUri) {
					$current_file_name = basename($_SERVER['REQUEST_URI']);

					if ($current_file_name == $requestUri)
						echo 'class="active"';
				}
				?>
				<nav class="collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav navbar-nav" id="myTab">
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=1") ?>>
							<a href="index-admin.php?changePage=1">User</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=2") ?>>
							<a href="index-admin.php?changePage=2">Nhóm User</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=3") ?>>
							<a href="index-admin.php?changePage=3">Nước</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=4") ?>>
							<a href="index-admin.php?changePage=4">Nhà Sản Xuất</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=5") ?>>
							<a href="index-admin.php?changePage=5">Thể Loại</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=6") ?>>
							<a href="index-admin.php?changePage=6">Film Yêu Cầu</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=7") ?>>
							<a href="index-admin.php?changePage=7">Film Bộ</a>
						</li>
						<li <?php echoActiveClassIfRequestMatches("index-admin.php?changePage=8") ?>>
							<a href="index-admin.php?changePage=8">Film Lẻ</a>
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> <?php
							echo($_SESSION["adminLog"]);
						?>
							<span class="caret"></span> </a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="configPage.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Tùy Chỉnh Tài Khoản&nbsp;&nbsp;&nbsp;</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="index-admin.php?logOut=1"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;Đăng Xuất&nbsp;&nbsp;&nbsp;</a>
								</li>

							</ul>

						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="container bs-docs-container">
			<div class="tab-content">
				<?php
				if(isset($_GET['changePage']))
				{
				if($_GET['changePage']=='1')
				{
				require 'include/userForm.php';
				}
				else if($_GET['changePage']=='2')
				{
				require 'include/userLevelForm.php';
				}
				else if($_GET['changePage']=='3')
				{
				require 'include/countryForm.php';
				}
				else if($_GET['changePage']=='4')
				{
				require 'include/productionForm.php';
				}
				else if($_GET['changePage']=='5')
				{
				require 'include/catalogeForm.php';
				}
				else if($_GET['changePage']=='6')
				{
				require 'include/filmYeuCauForm.php';
				}
				else if($_GET['changePage']=='7')
				{
				require 'include/filmBoForm.php';
				}
				else if($_GET['changePage']=='8')
				{
				require 'include/filmLeForm.php';
				}
				else if($_GET['changePage']=='9')
				{
				require 'include/filmBoCTForm.php';
				}
				}
				else {
				?>
				<h1 class="text-center text-info">Chào Mừng Đến Với Trang Quản Trị</h1>
				<?php
				} ?>
			</div>
		</div>
		<br />
		<br />

		<footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav">
			<div class="container">
				<p class="collapse navbar-collapse bs-navbar-collapse" style="color: white;">
					&copy; 2012 - <?php echo date('Y');
					//mysql_close($link);
					?>
					by DVL Grp. All rights reserved. Designed (with Bootstrap 3.0) and coded this admin page by one of the member of DVL <strong><a href="#">VIET_NT</a></strong>
				</p>

			</div>
		</footer>
	</body>
</html>