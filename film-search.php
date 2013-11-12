<?php
include 'core/Connect.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<!-- Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Live Search Tutorial</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Load CSS -->
	<link href="style/style.css" rel="stylesheet" type="text/css" />
	<!-- Load Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold" type="text/css" />
	<!-- Load jQuery library -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Load custom js -->
	<script type="text/javascript" src="search.js"></script>
</head>
<body >
	<div id="main">
		
		<!-- Main Input -->
		<input type="text" id="search" autocomplete="off">

		<!-- Show Results -->
		<h4 id="results-text">Kết quả phim với từ khóa: <b id="search-string">Array</b></h4>
		<ul id="results"></ul>


	</div>

</body>
</html>