<?php
	include 'core/Connect.php';
	
	$limit	= 30;	//Giới hạn số phim hiển thị
	$title	= null; //Tiêu đề list phim
	$query	= null; //Câu lệnh sql
	$result = null;
	$filmID = null;
	$film	= null;
	
	if(isset($_REQUEST['dsPhimLe'])){
		$query 	= "SELECT * FROM film_le LIMIT $limit";
		$title 	= "Danh sách phim lẻ";
		$filmID = "filmLeID";
		$film	= "film_le_";
	}
	elseif(isset($_REQUEST['dsPhimBo'])){
		$query 	= "SELECT * FROM film_bo LIMIT $limit";
		$title 	= "Danh sách phim bộ";
		$filmID = "filmBoID";
		$film	= "film_bo_";
	}
	elseif(isset($_REQUEST['filmCatID'])){
		$query 	= "SELECT * FROM film_bo, film_le" + 
					"WHERE film_cataloge_id = '"+$filmCatID+"' LIMIT $limit";
		$title 	= "Phim ";
		
	}
	elseif(isset($_REQUEST['filmCountryID'])){
		$query 	= "SELECT * FROM film_bo, film_le"+
					"WHERE film_country_id = '"+$filmCountryID+"' LIMIT $limit";
		$title 	= "Phim ";
	}
	else {
		
	}
	
				
?>

<div class="row">
	<?php /* Danh sách phim */ ?>
	<div class="list-film col-lg-8 pull-left ">
		<div class="list-film-header">
			<p class="title">
				<?php echo $title ?>
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
				<?php
					$result = mysql_query($query, $my_connect);
					while($row = mysql_fetch_array($result)){
						echo '<li class="list-flim-li-22">';
						echo 	'<a href="index.php?'.$filmID.'='.$row[''.$film.'id'].'"> <img class="poster" src="'.$row[''.$film.'avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
						echo 	'<div class="name">';
						echo 		'<span class="name_vi"> <a href="index.php?'.$filmID.'='.$row[''.$film.'id'].'">'.$row[''.$film.'name_vi'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span class="name_en"> <a href="index.php?'.$filmID.'='.$row[''.$film.'id'].'">'.$row[''.$film.'name'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span > <a href="">'.$row[''.$film.'namsx'].'</a> </span>';
						echo 	'</div>';
						echo '</li>';
					}
					mysql_free_result($result);
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


<?php	mysql_close($my_connect); ?>