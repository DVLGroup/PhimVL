
<?php
	include 'core/Connect.php';	
	
	$query 		= null;
	$filmID 	= null;
	$film 		= null;
	$isFilmBo 	= FALSE;
	
	if((isset($_REQUEST['filmBoID']) OR isset($_REQUEST['filmLeID'])) ){
		if(isset($_REQUEST['filmBoID'])){
			$filmID	= $_REQUEST['filmBoID'];
			$film 	= "film_bo_"; 
			$query 	= "SELECT * FROM film_bo WHERE film_bo_id = '".$filmID."'";
			$filmID = "filmBoID";
			$isFilmBo = TRUE;
		}
		elseif(isset($_REQUEST['filmLeID'])){
			$filmID = $_REQUEST['filmLeID'];
			$film 	= "film_le_";
			$query 	= "SELECT * FROM film_le WHERE film_le_id = '".$filmID."'";
			$filmID = "filmLeID";
		}
	}
			
	$result_filmReview 	= mysql_query($query, $my_connect);
	$row_filmReview 	= mysql_fetch_array($result_filmReview);
?>

<!--Facebook Public -->
<div id="fb-root"></div>
<script>
	( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=531718326909547";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk')); 
</script>



<div id="filmReview" class="mg-15">
	<h2 class="title"><?php echo $row_filmReview[''.$film.'name_vi']; ?> - <?php echo $row_filmReview[''.$film.'name']; ?> - <?php echo $row_filmReview[''.$film.'namsx']; ?></h2>
	<div>
		<div id="dt">
			<img class="cover" alt="Avatar cua phim" src="<?php echo $row_filmReview[''.$film.'avatar'];?>"/>
			<div class="info">
				<h2><?php echo $row_filmReview[''.$film.'name_vi'];?></h2>
				<h3><?php echo $row_filmReview[''.$film.'name'];?></h3>
				<p>
					<b>Đạo diễn:</b> <?php echo $row_filmReview[''.$film.'daodien'];?> 
				</p>
				<p>
					<b>Diễn viên:</b> <?php echo $row_filmReview[''.$film.'dienvien'];?>
				</p>
				<p>
					<b>Thế loại:</b>
					<?php
						$sql1 = "SELECT * FROM film_cataloge WHERE film_cataloge_id = '".$row_filmReview[''.$film.'cataloge_id_first']."' OR film_cataloge_id = '".$row_filmReview[''.$film.'cataloge_id_second']."' OR film_cataloge_id = '".$row_filmReview[''.$film.'cataloge_id_third']."' ";
						$rs1 = mysql_query( $sql1, $my_connect);
						
						while($rw1 = mysql_fetch_array($rs1)){
							echo '<a href="index.php?filmCatID='.$rw1['film_cataloge_id'].'"> '.$rw1['film_cataloge_name'].' </a> ' ;
							echo ', ';
						}
						mysql_free_result($rs1);
					?>  
				</p>
				<p>
					<b>Quốc gia:</b> 
					<?php
						$sql2 = "SELECT * FROM film_country WHERE film_country_id = '".$row_filmReview[''.$film.'country_id']."' ";
						$rs2 = mysql_query( $sql2, $my_connect);
						
						while($rw2 = mysql_fetch_array($rs2)){
							echo '<a href="index.php?filmCountryID='.$rw2['film_country_id'].'"> '.$rw2['film_country_name'].' </a> ' ;
						}
						mysql_free_result($rs2);
					?>  
				</p>
				<p>
					<b>Nhà sản xuất:</b> 
					<?php
						$sql3 = "SELECT film_nhasx_name FROM film_nhasx WHERE film_nhasx_id = '".$row_filmReview[''.$film.'nhasx_id']."'";
						$rs3 = mysql_query( $sql3, $my_connect);
						$rw3 = mysql_fetch_array($rs3);
						echo $rw3['film_nhasx_name'];
						mysql_free_result($rs3);
					?> 
				</p>
				<p>
					<b>Năm sản xuất:</b> <?php echo $row_filmReview[''.$film.'namsx']?> 
				</p>
				<p>
					<b>Thời lượng:</b> 111 phút
				</p>
				<p>
					<a href="index.php?filmPlay=1&<?php echo $filmID ?>=<?php echo $row[''.$film.'id'] ?><?php if($isFilmBo) echo '&ep=1' ?>">
					<button type="button" class="btn btn-lg btn-primary">
						<i class="glyphicon glyphicon-play"></i> Xem Phim
					</button></a>
				</p>
				<p>
					Like button
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
	<div class="entry">
		<p class="tomtatPhim">
			<?php echo $row_filmReview[''.$film.'content']?> 
		</p>
	</div>
	<div class="devider"></div>
</div>



<?php
	mysql_free_result($result_filmReview);
	mysql_close($my_connect);	
?>