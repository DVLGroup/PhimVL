<?php
		include 'core/Connect.php';			
?>

<div class="row">
	<div class="list-film col-lg-8 pull-left ">
		<div class="list-film-header">
			<p class="title">
				Phim Lẻ Mới
			</p>
		</div>
		<div class="list-film-body">
			<ul class="film-show-list-ul list-unstyled">
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
						$result = mysqli_query($my_connect, $sql);
						while($row = mysqli_fetch_array($result)){
							echo "<li>";
							echo 	"<a href='filmCountryID=$row[0]'>$row[1]</a>";
							echo "</li>";	
						}
						mysqli_free_result($result);
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
						$result = mysqli_query($my_connect, $sql);
						while($row = mysqli_fetch_array($result)){
							echo "<li>";
							echo 	"<a href='filmCountryID=$row[0]'>$row[1]</a>";
							echo "</li>";	
						}
						mysqli_free_result($result);
					 ?>
					<div class="clearfix"></div>			
				</ul>
			</div>
		</div>
		
	</div>
		
				
</div>

<div class="clearfix"></div>


<?php
	mysqli_close($my_connect);		
?>