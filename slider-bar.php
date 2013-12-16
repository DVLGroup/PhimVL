<?php
	include 'core/Connect.php';		
	
?>
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
						$result = mysql_query($sql, $my_connect);
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
		<div class="clearfix"></div>	
	</div>