<?php
    include 'core/Connect.php';
	
	//Nếu parameter searchFilm tồn tại thì in ra danh sách kết quả tìm kiếm
	if(isset($_REQUEST['searchFilm'])){
		//Tạo mẫu li
		$html = '<li class="list-film-li-22">';		
		$html .= '<a href="filmLink"> <img class="poster" src="imgSrc" /> </a>';
		$html .= '<div class="name">';
		$html .= '<span class="name_vi"> <a href="filmLink">filmnameVi</a> </span>';
		$html .= '<br>';
		$html .= '<span class="name_en"> <a href="filmLink">filmName</a> </span>';
		$html .= '<br>';
		$html .= '<span > <a href="filmLink">filmNamsx</a> </span>';
		$html .= '</div>';
		$html .= '</li>';
		$filmLink = 'filmLink';
		$imgSrc = 'imgSrc';
		$filmNameVi = 'filmnameVi';
		$filmName = 'filmName';
		$filmNamsx = 'filmNamsx';
		//Tiếp nhận từ khóa tìm kiếm
		$string_search = $_REQUEST['string_search'];
		//Tạo câu lệnh truy vấn tìm kiếm
		$query_searchFilmBo = 'SELECT * FROM film_bo WHERE film_bo_name LIKE "%'.$string_search.'%" OR film_bo_name_vi LIKE "%'.$string_search.'%" LIMIT 15';
		$query_searchFilmLe = 'SELECT * FROM film_le WHERE film_le_name LIKE "%'.$string_search.'%" OR film_le_name_vi LIKE "%'.$string_search.'%" LIMIT 15';
		//Thực hiện câu truy vấn
		$rs_searchFilmLe = mysql_query($query_searchFilmLe, $my_connect);
		$rs_searchFilmBo = mysql_query($query_searchFilmBo, $my_connect);
		//Lấy danh sách kết quả truy vấn gán vào mảng kết quả
		////và giải phóng vùng nhớ 
		while($rw = mysql_fetch_array($rs_searchFilmLe)){
			$results[] = $rw;
			echo $rw[1];
		}
		mysql_free_result($rs_searchFilmLe);
		while($rw = mysql_fetch_array($rs_searchFilmBo)){
			$results[] = $rw;
		}
		mysql_free_result($rs_searchFilmBo);
		//Kiểm tra trường hợp trước khi cho in ra màn hình
		////Nếu có kết quả thì in ra
		if(isset($results)){
			foreach ($results as $rs) {
				//Kiểm tra phần tử hiện tại là của film bộ hay film lẻ
				////Để config vài thông tin khác nhau
				if(isset($rs['film_bo_id']))
				{
					$film = 'film_bo';
					$filmParaID = 'filmBoID';
				}else{
					$film = 'film_le';
					$filmParaID = 'filmLeID';
				}
				
				//Thay đổi mẫu html và gán vào mảng output
				$output[] = str_replace($filmName, $rs[''.$film.'_name'], $html);
				$output = str_replace($filmNameVi, $rs[''.$film.'_name_vi'], $output);
				$output = str_replace($filmNamsx, $rs[''.$film.'_namsx'], $output);
				$output = str_replace($filmLink, 'index.php?'.$filmParaID.'='.$rs[''.$film.'_id'], $output);
				$output = str_replace($imgSrc, $rs[''.$film.'_avatar'],$output);				
			}
		}
		//Nếu không có kết quả
		else {
			$output[] = "Không có kết quả phù hợp! Xin thử lại";
		}		
		//Liệt kê danh sách ra màn hình 88-92
		
	}
	//Nếu không tồn tại parameter searchFilm thì quay lại trang index.php
	else {
		
	}
?>


<div class="row">
	<?php /* Danh sách phim */ ?>
	<div class="list-film col-lg-8 pull-left ">
		<div class="list-film-header">
			<p class="title">
				Từ khóa <?php echo $string_search ?>
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
				<?php //Liệt kê danh sách ra màn hình
					foreach ($output as $op) {
						echo $op;
					}
				?>
			</ul>
		</div>
		<div class="clearfix"></div>
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