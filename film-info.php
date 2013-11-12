
<?php
	include 'core/Connect.php';	
	
	$filmID = $_GET("filmID");
	$is_filmbo = $_GET("is_filmbo");
	
	if($is_filmbo == "true"){
		$sql = "SELECT * FROM film_bo, film_bo_ct " +
				"WHERE film_bo.film_bo_id = film_bo_ct.film_bo_id "+
				"AND film_bo_id = $filmID";
	}
	elseif ($is_filmbo == "false") {
		$sql = "SELECT * FROM film_le WHERE film_le_id = $filmID";
	}
	
	
	$result = mysqli_query($sql);
	$row = mysqli_fetch_array($result);
?>




<div id="chitietPhim" class="mg-15">
	<h2 class="title"><?=$row[''] ?></h2>
	<div>
		<div id="dt">
			<img class="cover" alt="Hinh bia cua phim" src=""/>
			<div class="info">
				<h2>Tìm Lại Kí Ức - Matataki</h2>
				<h3>Piecing Me Back Together</h3>
				<p>
					Đạo diễn: Itsumichi Isomura
				</p>
				<p>
					Diễn viên: Keiko Kitagawa, Nene Ohtsuka, Masaki Okada, Wakana Chisaki, Motoki Fukami, Yoshikazu Matsumoto, Eiko Nagashima, Misa Shimizu
				</p>
				<p>
					Thể loại: Tâm Lý - Tình Cảm
				</p>
				<p>
					Quốc gia: Nhật Bản
				</p>
				<p>
					Nhà sản xuất: Stardust Pictures (SDP)
				</p>
				<p>
					Thời lượng: 111 phút
				</p>
				<p>
					<a href="">
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
			Phim tập trung vào những năm cuối cùng của võ sư Diệp Vấn ở Hồng Kông (thập niên 50) 
			bao gồm mối quan hệ thân thiết giữa ông và vợ là Trương Vĩnh Thành.
			Phần này sẽ tràn ngập những pha hành động nguy hiểm và 
			đề cập đến những khía cạnh trong cuộc sống khổ cực của đại võ sư Diệp Vấn trong thập niên 50 
			khi ông sinh sống ở Hong Kong. Nhiều thông tin cho rằng bà Trương Vĩnh Thành đã theo chồng đến Hong Kong 
			và rất đau lòng vì Diệp Vấn từ một người giàu có phải sống trong cảnh thiếu thốn ở nơi quê người. 
			Tuy nhiên, vì hiểu rõ quyết tâm của chồng nên bà vẫn giữ vai trò vợ hiền và lặng thầm ủng hộ chồng.
		</p>
		
		<p class="picture">
			<img src="images/film/Strike-Back-Season-4-2013-5.jpg" />
			<img src="" />
		</p>
	</div>
	<div class="devider"></div>
</div>



<?php
	mysqli_close($my_connect);	
?>


