

<?php
	$dsPhimMoi		= null;
	$dsPhimLe		= null;
	$dsPhimBo		= null;
	$filmLeID		= null;
	$filmBoID		= null;
	$filmCatID		= null;
	$filmCountryID	= null;
	$resultSearch	= null;
	$requestFilm	= null;
	
	$includePage	= null;
	
	//Chèn trang film-moi
	if(isset($_REQUEST['dsPhimMoi'])){
		//$dsPhimMoi		= $_REQUEST['dsPhimMoi'];//True hoac false
		include 'film-moi.php';
	}
	//Chèn trang 
	elseif(isset($_GET['dsPhimLe']) || isset($_REQUEST['dsPhimBo'])){
		//$dsPhimLe		= $_REQUEST['dsPhimLe'];//True hoac false
		include 'list-film.php';
	}
		
	elseif(!isset($_REQUEST['filmPlay']) AND (isset($_REQUEST['filmBoID']) OR isset($_REQUEST['filmLeID'])) ){
		//$filmLeID		= $_REQUEST['filmLeID'];
		include 'film-review.php';
	}
	
	elseif(isset($_REQUEST['filmPlay']) AND (isset($_REQUEST['filmBoID']) OR isset($_REQUEST['filmLeID'])) ){
		include 'film-play.php';
	}
	
	elseif(isset($_REQUEST['filmCatID']) OR isset($_REQUEST['filmCountryID']) ){
		include 'list-film-2.php';
	}
	
	elseif(isset($_REQUEST['requestFilm'])){
		$requestFilm	= $_REQUEST['requestFilm'];//True hoac false	
		$includePage = $requestFilm;
	}
	else {
		include 'film-moi.php';
	}
	
	
