<script>
$(document).ready(function() {
  $("#editor").wysibb()
})
</script>
<?php
	include 'core/Connect.php';	
	
	$query 		= null;
	$filmID 	= null;
	$film 		= null;
	$isFilmBo 	= FALSE;
	$filmParName = null;//Tên biến filmBoID hoặc filmLeID
	
	
	if((isset($_REQUEST['filmBoID']) OR isset($_REQUEST['filmLeID'])) ){
		if(isset($_REQUEST['filmBoID'])){
			$filmID	= $_REQUEST['filmBoID'];
			$film 	= "film_bo_"; 
			$query 	= "SELECT * FROM film_bo WHERE film_bo_id = '".$filmID."'";
			$filmParName  = "filmBoID";
			$isFilmBo = TRUE;
			
			$self = $_SERVER['PHP_SELF']."?filmBoID=$filmID";
		}
		elseif(isset($_REQUEST['filmLeID'])){
			$filmID = $_REQUEST['filmLeID'];
			$film 	= "film_le_";
			$query 	= "SELECT * FROM film_le WHERE film_le_id = '".$filmID."'";
			$filmParName = "filmLeID";
			
			$self = $_SERVER['PHP_SELF']."?filmLeD=$filmID";
		}
	}
			
	$result_filmReview 	= mysql_query($query, $my_connect);
	$row_filmReview 	= mysql_fetch_array($result_filmReview);
?>

<?php
	//======================== START OF FUNCTION ==========================//
// FUNCTION: bbcode_to_html                                            //
//=====================================================================//
function bbcode_to_html($bbtext){
  $bbtags = array(
    '[heading1]' => '<h1>','[/heading1]' => '</h1>',
    '[heading2]' => '<h2>','[/heading2]' => '</h2>',
    '[heading3]' => '<h3>','[/heading3]' => '</h3>',
    '[h1]' => '<h1>','[/h1]' => '</h1>',
    '[h2]' => '<h2>','[/h2]' => '</h2>',
    '[h3]' => '<h3>','[/h3]' => '</h3>',

    '[paragraph]' => '<p>','[/paragraph]' => '</p>',
    '[para]' => '<p>','[/para]' => '</p>',
    '[p]' => '<p>','[/p]' => '</p>',
    '[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
    '[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
    '[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
    '[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

    '[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
    '[italic]' => '<span style="font-weight:bold;">','[/italic]' => '</span>',
    '[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
    '[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
    '[i]' => '<span style="font-weight:bold;">','[/i]' => '</span>',
    '[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
    '[break]' => '<br>',
    '[br]' => '<br>',
    '[newline]' => '<br>',
    '[nl]' => '<br>',
    
    '[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
    '[list]' => '<ul>','[/list]' => '</ul>',
    '[ul]' => '<ul>','[/ul]' => '</ul>',

    '[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
    '[ol]' => '<ol>','[/ol]' => '</ol>',
    '[list_item]' => '<li>','[/list_item]' => '</li>',
    '[li]' => '<li>','[/li]' => '</li>',
    
    '[*]' => '<li>','[/*]' => '</li>',
    '[code]' => '<code>','[/code]' => '</code>',
    '[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
    '[pre]' => '<pre>','[/pre]' => '</pre>',
    '[video]' => '<br/><iframe src="http://youtube.com/embed/','[/video]' =>  '"width="100%" height="480" frameborder="0"></iframe><br/>'   
  );

  $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

  $bbextended = array(
    "/\[url](.*?)\[\/url]/i" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
    "/\[url=(.*?)\](.*?)\[\/url\]/i" => "<a href=\"$1\" title=\"$1\">$2</a>",
    "/\[email=(.*?)\](.*?)\[\/email\]/i" => "<a href=\"mailto:$1\">$2</a>",
    "/\[mail=(.*?)\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$2</a>",
    "/\[img\]([^[]*)\[\/img\]/i" => "<img src=\"$1\" alt=\" \" />",
    "/\[image\]([^[]*)\[\/image\]/i" => "<img src=\"$1\" alt=\" \" />",
    "/\[image_left\]([^[]*)\[\/image_left\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_left\" />",
    "/\[image_right\]([^[]*)\[\/image_right\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_right\" />",
  );

  foreach($bbextended as $match=>$replacement){
    $bbtext = preg_replace($match, $replacement, $bbtext);
  }
  return $bbtext;
}
//=====================================================================//
//  FUNCTION: bbcode_to_html                                           //
//========================= END OF FUNCTION ===========================//
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
					<a href="index.php?filmPlay=1&<?php echo $filmParName ?>=<?php echo $filmID?><?php if($isFilmBo) echo '&ep=1' ?>">
					<button type="button" class="btn btn-lg btn-primary">
						<i class="glyphicon glyphicon-play"></i> Xem Phim
					</button></a>
				</p>
				</br>
				</br>
				<p>
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
	<div class="entry">
		<p class="tomtatPhim">
			<?php 
				$contentFilm = $row_filmReview[''.$film.'content'];
				echo bbcode_to_html($contentFilm);
			?>
		</p>
	</div>
	<div class="list-film-footer"></div>	
</div>


<?php //Show film with cataloge 
	
	$query_TLFilm	= "SELECT ".$film."cataloge_id_first, ".$film."cataloge_id_second, ".$film."cataloge_id_third FROM ".rtrim($film,'_')." WHERE ".$film."id = '$filmID'";
	
	$result_TLFilm	= mysql_query($query_TLFilm, $my_connect);
	
	
	
	while($row = mysql_fetch_array($result_TLFilm)){		
		$sql	= "SELECT * FROM ".rtrim($film,'_')." WHERE ".$film."cataloge_id_first = '$row[0]' OR ".$film."cataloge_id_second = '$row[0]' OR ".$film."cataloge_id_third = '$row[0]' ";
		$sql	.= "OR ".$film."cataloge_id_first = '$row[1]' OR ".$film."cataloge_id_second = '$row[1]' OR ".$film."cataloge_id_third = '$row[1]' ";
		$sql	.= "OR ".$film."cataloge_id_first = '$row[2]' OR ".$film."cataloge_id_second = '$row[2]' OR ".$film."cataloge_id_third = '$row[2]' ";
	}
	
	//foreach($results as $result){
		//$sql	= "SELECT * FROM ".rtrim($film,'_')." WHERE ".$film."cataloge_id_first = '$result[0]' OR ".$film."cataloge_id_second = '$result[0]' OR ".$film."cataloge_id_third = '$result[0]' ";
		//$sql	.= "OR ".$film."cataloge_id_first = '$result[1]' OR ".$film."cataloge_id_second = '$result[1]' OR ".$film."cataloge_id_third = '$result[1]' ";
		//$sql	.= "OR ".$film."cataloge_id_first = '$result[2]' OR ".$film."cataloge_id_second = '$result[2]' OR ".$film."cataloge_id_third = '$result[2]' ";
		
	//}
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
	
	$sql .= " LIMIT $start, $perPage";
	
		$rs		= mysql_query($sql, $my_connect);
		while($rw = mysql_fetch_array($rs)){
			$results_filmCungTL[] = $rw;
		}
?>

<div class="row">
	<?php /* Danh sách phim */ ?>
	<div class="list-film col-lg-8 pull-left ">
		<div class="list-film-header">
			<p class="title">
				Phim cùng thể loại
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
				<?php
					foreach($results_filmCungTL as $row){
						echo '<li class="list-flim-li-22">';
						echo 	'<a href="index.php?'.$filmParName.'='.$row[''.$film.'id'].'"> <img class="poster" src="'.$row[''.$film.'avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
						echo 	'<div class="name">';
						echo 		'<span class="name_vi"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'id'].'">'.$row[''.$film.'name_vi'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span class="name_en"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'id'].'">'.$row[''.$film.'name'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span > <a href="index.php?'.$filmParName.'='.$row[''.$film.'id'].'">'.$row[''.$film.'namsx'].'</a> </span>';
						echo 	'</div>';
						echo '</li>';
					}
				?>
				<li class="list-flim-li-22">
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

				<li class="list-flim-li-22">
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

				<li class="list-flim-li-22">
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

				<li>
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

				<li>
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

				<li>
					<a href=""> <img class="poster" src="images/film/thumbnail/nguoi-sat-3-2013.jpg" alt='abc' /> </a>

					<div class="name">
						<span class="name_vi"> <a href="">Nam Dam Huyen Thoai</a> </span>
						<br>
						<span class="name_en"> <a href="">First of Legend</a> </span>
						<br>
						<span > <a href="">2013</a> </span>
					</div>
				</li>

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
	
	
	
	
	
	
	<?php /* Cột slider bar */ ?>
	<div class="sliderbar col-lg-4 pull-right">
		
		
		<div class="sliderbar-content">
			<div class="sliderbar-heading">
				<h4 class="sliderbar-title" >PHIM XEM NHIỀU TRONG NGÀY</h4>
			</div>
			<div class="sliderbar-body">
				<ul class="list-film-thumbnail list-unstyled">
					<li>
						<div class="media">
							<a class="pull-left" href="#"> <img class="media-object" src="images/film/thumbnail/Ip-Man-The-Final-Fight-2013.jpg" alt="..."> </a>
							<div class="media-body">
								<span class="media-heading">Ip Man The Final - Trận đánh cuối cùng - 2013</span></br>
								<span> <small> Nội dung phim:  Series phim truyền hình Mỹ cực kỳ hấp dẫn. Prison Break là 1 serie phim truyền hình xuất sắc thuộc thể loại hình sự,...
									</small> </span>
								<span>
									</br>
									Lượt xem: 50239 </span>
							</div>
						</div>
					</li>
					
					<li>
						<div class="media">
							<a class="pull-left" href="#"> <img class="media-object" src="images/film/thumbnail/Ip-Man-The-Final-Fight-2013.jpg" alt="..."> </a>
							<div class="media-body">
								<span class="media-heading">Ip Man The Final - Trận đánh cuối cùng - 2013</span></br>
								<span> <small> Nội dung phim:  Series phim truyền hình Mỹ cực kỳ hấp dẫn. Prison Break là 1 serie phim truyền hình xuất sắc thuộc thể loại hình sự,...
									</small> </span>
								<span>
									</br>
									Lượt xem: 50239 </span>
							</div>
						</div>
					</li>				
				</ul>
			</div>
		</div>			
		
		
		
		
		
		<div class="sliderbar-content">
			<div class="sliderbar-heading">
				<h4 class="sliderbar-title" >PHIM THEO THỂ LOẠI</h4>
			</div>
			<div class="sliderbar-body">
				<ul class="list-cataloge list-unstyled">
					 <?php
						$sql = "SELECT * FROM film_cataloge";
						$result = mysql_query($sql, $my_connect);
						while($row = mysql_fetch_array($result)){
							echo "<li>";
							echo 	"<a href='index.php?filmCatID=$row[0]'>$row[1]</a>";
							echo "</li>";	
						}
						mysql_free_result($result);
					 ?>
					<div class="clearfix"></div>							
				</ul>
			</div>
		</div>	
		
		<div class="sliderbar-content">
			<div class="sliderbar-heading">
				<h4 class="sliderbar-title" >PHIM THEO QUỐC GIA</h4>
			</div>
			<div class="sliderbar-body">
				<ul class="list-cataloge list-unstyled">
					 <?php
						$sql = "SELECT * FROM film_country";
						$result = mysql_query( $sql,$my_connect);
						while($row = mysql_fetch_array($result)){
							echo "<li>";
							echo 	"<a href='index.php?filmCountryID=$row[0]'>$row[1]</a>";
							echo "</li>";	
						}
						mysql_free_result($result);
					 ?>
					<div class="clearfix"></div>			
				</ul>
			</div>
		</div>
		
	</div>
		
				
</div>
<div class="clearfix"></div>



<?php
	mysql_free_result($result_filmReview);
	mysql_close($my_connect);	
?>