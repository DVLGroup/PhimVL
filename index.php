<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>PhimVL - Phim hay nhat qua dat</title>
		<meta name="description" content="Trang xem phim nay do 2 designer Trong Loi thiet ke fornt-end va Trung Viet thiet ke phan back-end" />
		<meta name="author" content="trong_000" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		
		<!-- Chèn link CSS -->
        <link rel="stylesheet" href="css/bootstrapv3.css" type="text/css"  media="print,screen" />
        <link rel="stylesheet" href="css/bootstrap-glyphicons.css" type="text/css"  media="print,screen" />
        <link rel="stylesheet" href="css/layout.css" type="text/css"  media="print,screen" />
		<link rel="stylesheet" href="css/style.css" type="text/css"  media="print,screen" />
		<link rel="stylesheet" href="css/film.css" type="text/css" media="screen,print" />
		<link rel="stylesheet" href="css/sliderbar.css" type="text/css"  media="print,screen" />
		<link rel="stylesheet" href="css/film-info.css" type="text/css"  media="print,screen" />
		<link rel="stylesheet" href="css/styleSearch.css" type="text/css"  media="print,screen" />
		<link rel="stylesheet" href="css/wbbtheme.css" type="text/css"  media="print,screen" />
		
        <!-- Chèn link JavaScript-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/searchFilm.js" type="text/javascript"></script>
        <script src="js/jquery.wysibb.js" type="text/javascript"></script>
        
		
		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="slider/css/style.css" />
	</head>

	<body>
		<div id="layout">
			<header class="wrap">
				
				<img class="logo" src="images/header/logo.png">
				
				<div id='flogin' class="pull-right">
			<!-- Button trigger modal -->
			<a href="#myModal" data-toggle="modal" data-target="#myModal"> Đăng ký </a>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div id='signup' class="signup-black">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
							<h3 class="text-warning text-center">ĐĂNG KÝ TÀI KHOẢN</h3>
							<form method="POST" action="#myModal">
								<div class="form-group" align="center">
									<span class='success text-success'>Đăng ký thành công!</span>
									<span class='error text-danger'>Đăng ký thất bại!</span>
								</div>
								<div class="signup-content">
									<div id='user_name' class="form-group">
										<label>Họ và tên: </label>
										<i class="iwarning glyphicon"> </i>
										<input type="text" class="form-control" name='user_name'/>
										<p class="nameError warning">
											Ít nhất 4 ký tự!
										</p>
									</div>
									<div id='user_email' class="form-group">
										<label>Email: </label>
										<i class="iwarning glyphicon"> </i>
										<input name='user_email' type="email" class="form-control"/>
										<p class="emailError warning">
											Email không hợp lệ!
										</p>
										<p class="emailExistError warning">
											Email đã được tạo !
										</p>
									</div>
									<div id='user_password' class="form-group">
										<label>Mật khẩu: </label>
										<i class="iwarning glyphicon"> </i>
										<input name='user_password' type="password" class="form-control"/>
										<p class="passwordError warning">
											Ít nhất 6 ký tự!
										</p>
									</div>
									<div id='user_password2' class="form-group">
										<label>Xác thực mật khẩu: </label>
										<i class="iwarning glyphicon"> </i>
										<input name='user_password2' type="password" class="form-control"/>
										<p class='password2Error warning'>
											Mật khẩu xác thực không trùng khớp !
										</p>
									</div>
									<div class="form-group btnAction">
										<span class="loader"><img src="images/loader.gif"> </span>
										<button type="button" class="btn btn-sm btn-primary" onclick="checkSignup()">
											Đăng ký
										</button>
										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
											Hủy
										</button>
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div><!-- /.modal -->
			&nbsp&nbsp&nbsp
			<a href="#">Đăng nhập</a>
			&nbsp&nbsp&nbsp
			<img class='fbloginbtn' src="images/fbloginbtn.png" />
		</div>
			</header>
			
			<div id="body">
				<div id="layout-center">
					<!--@ Start WOWSlider.com BODY section -->
					<div id="slider">
						<?php
							include 'slider.php';
						?><!--@@ End WOWSlider.com BODY section -->
					</div>
					
					<div id="layout-center-B">
						<!--@ NAVIGATION BAR -->				
						<?php 
							require 'navbar.php'; 
						?><!--@@ END -->				
						<div class="container">
							<!--@ DANH SACH HIEN THI-->
							<?php 
								require 'content.php';
								//include 'xemphim.php';
							?><!--@@ END -->
							<!--@ THONG TIN PHIM-->
							<?php 
								//include 'film-info.php';
							?><!--@@ END -->
							<?php
								//include 'slider-bar.php';
							?>
						</div>
					</div>
				</div>
				<div id="layout-left"></div>
				<div id="layout-right"></div>
				<div class="clearfix"></div>
			</div>
			
			<!--@ FOOTER -->
			<footer>
				
			</footer>				
			<!--@@ END -->	

			
		</div>
	</body>
</html>
