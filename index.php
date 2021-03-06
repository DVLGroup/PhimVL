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
        <script src="js/login.js" type="text/javascript"></script>
        <script src="js/searchFilm.js" type="text/javascript"></script>
        <script src="js/jquery.wysibb.js" type="text/javascript"></script>
        
        <!-- Bat fly-->
        <script type='text/javascript'>
			$(function() {
				$(window).scroll(function() {
					if ($(this).scrollTop() !== 0) {
						$('#bttop').fadeIn();
					} else {
						$('#bttop').fadeOut().animate({
							bottom : "30px",
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
						right : "850px"
					}, 1500);
				});
				$('#submit').click(function() {
					$('body,html').animate({
						scrollTop : 0
					}, 300);
				});
			});
		</script>
		
		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="slider/css/style.css" />
	</head>

	<body>
		<div class="btn btn-lg" id="bttop"><img width="90" height="40" src="images/batman-icon.png" />
		</div>
		<div id="layout">
			
			
			
			<?php //Header
				include 'header.php';
			?>
			
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
