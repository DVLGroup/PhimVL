<?php
    include 'core/Connect.php';
	
	if(isset($_REQUEST['filmCatID'])){
		$filmCatID	= $_REQUEST['filmCatID'];
		$query_FilmBo	= "SELECT * FROM film_bo WHERE film_bo_cataloge_id_first = $filmCatID " ;
		$query_FilmBo .= " OR film_bo_cataloge_id_second = $filmCatID";
		$query_FilmBo .= " OR film_bo_cataloge_id_third = $filmCatID";
		
		$query_FilmLe	= "SELECT * FROM film_le WHERE film_le_cataloge_id_first = $filmCatID " ;
		$query_FilmLe .= " OR film_le_cataloge_id_second = $filmCatID";
		$query_FilmLe .= " OR film_le_cataloge_id_third = $filmCatID";
		
		$query_nameCat	= "SELECT film_cataloge_name FROM film_cataloge WHERE film_cataloge_id = $filmCatID";
		$rs_nameCat		= mysql_query($query_nameCat, $my_connect);
		$rw_nameCat		= mysql_fetch_array($rs_nameCat);
		$title		= $rw_nameCat['film_cataloge_name'];
		
		$self = $_SERVER['PHP_SELF']."?filmCatID=$filmCatID";
	}
	elseif(isset($_REQUEST['filmCountryID'])){
		$filmCountryID = $_REQUEST['filmCountryID'];
		$query_FilmBo	= "SELECT * FROM film_bo WHERE film_bo_country_id = $filmCountryID";
		$query_FilmLe	= "SELECT * FROM film_le WHERE film_le_country_id = $filmCountryID";
		
		$query_nameCountry	= "SELECT film_country_name FROM film_country WHERE film_country_id = $filmCountryID";
		$rs_nameCountry		= mysql_query($query_nameCountry, $my_connect);
		$rw_nameCountry		= mysql_fetch_array($rs_nameCountry);
		$title		= $rw_nameCountry['film_country_name'];
		
		$self = $_SERVER['PHP_SELF']."?filmCountryID=$filmCountryID";
	}		
	
?>


<?php
	
	$page 		= 1;
	$perPage	= 1;	// Elements on per page
	
	$start		= 0;		//Oder number of first element on this page
	
	
	$sql_totalPage = "SELECT COUNT(*) FROM film_bo";
	$rs = mysql_query($sql_totalPage);
	$rw = mysql_fetch_array($rs);
	$totalPage = $rw[0];
	
	if(isset($_REQUEST['page'])){
		$page = $_REQUEST['page'];
	}
	
	if($page > 1){
		$start	= ($page - 1) * $perPage;
	}
	
	$query_FilmBo 	.= " LIMIT $start, $perPage";
	$query_FilmLe 	.= " LIMIT $start, $perPage";
?>

<div class="row">
	<?php /* Danh sách phim */ ?>
	<div class="list-film col-lg-8 pull-left ">
		<div class="list-film-header">
			<p class="title">
				Phim Lẻ <?php echo $title ?>
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
				<?php
					$filmParName	= "filmLeID";
					$film	= "film_le";
					$rs_FilmLe 	= mysql_query($query_FilmLe, $my_connect);
					while($row = mysql_fetch_array($rs_FilmLe)){
						echo '<li class="list-flim-li-22">';
						echo 	'<a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'"> <img class="poster" src="admin/upload/hinhPhimAvatar/'.$row[''.$film.'_avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
						echo 	'<div class="name">';
						echo 		'<span class="name_vi"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name_vi'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span class="name_en"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span > <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_namsx'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span style="font-size:10px; color: #868484;">Lượt xem: '.$row[''.$film.'_viewed'].'</span>';
						echo 	'</div>';
						echo '</li>';
					}
					mysql_free_result($rs_FilmLe);
				?>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="list-film-footer"></div>	
		
		
		
		<div class="list-film-header">
			<p class="title">
				Phim Bộ <?php echo $title ?>
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
				<?php
					$filmParName	= "filmBoID";
					$film	= "film_bo";
					$rs_FilmBo 	= mysql_query($query_FilmBo, $my_connect);
					while($row = mysql_fetch_array($rs_FilmBo)){
						echo '<li class="list-flim-li-22">';
						echo 	'<a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'"> <img class="poster" src="admin/upload/hinhPhimAvatar/'.$row[''.$film.'_avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
						echo 	'<div class="name">';
						echo 		'<span class="name_vi"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name_vi'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span class="name_en"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span > <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_namsx'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span style="font-size:10px; color: #868484;">Lượt xem: '.$row[''.$film.'_viewed'].'</span>';
						echo 	'</div>';
						echo '</li>';
					}
					mysql_free_result($rs_FilmBo);
				?>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="list-film-footer"></div>
		
		<!--PHAN TRANG -->
		<div align="center">
			<ul class="pagination">
			<?php
			
				if($page == 1){
					echo '<li class="disabled"><a href="#">&laquo;</a></li>';
				}
				else {
					echo '<li><a href="'.$self.'&page='.($page - 1).'">&laquo;</a></li>';
				}
				
				for($i = 1; $i <= $totalPage; $i++){
					if($i == $page){
						echo '<li class="active"><a href="'.$self.'&page='.$i.'">'.$i.'</a></li>';
					}
					else {
						echo '<li><a href="'.$self.'&page='.$i.'">'.$i.'</a></li>';
					}
				}
				
				if($page == $totalPage){
					echo '<li class="disabled"><a href="#">&raquo;</a></li>';
				}
				else {
					echo '<li><a href="'.$self.'&page='.($page + 1).'">&raquo;</a></li>';
				}
			?>
			
			</ul>

		</div>
		
	</div>
	
	
	
	
	
	
	<?php /* Cột slider bar */ 
		include 'slider-bar.php';
	?>
		
				
</div>
<div class="clearfix"></div>
