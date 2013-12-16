
<?php
	include 'core/Connect.php';
	
	$filmID = null;
	$film	= null;
	$filmParName 	= null;
	$query_cover 	= null;
	$quey_linkFilm	= null;
	$link 	= null;		//Đường link của video phim
	
	if((isset($_REQUEST['filmLeID']) OR (isset($_REQUEST['filmBoID']))) AND !isset($_REQUEST['filmPlay'])){
		if(isset($_REQUEST['filmLeID'])){
			$filmID = $_REQUEST['filmLeID'];
			$film 	= "film_le_";
			$query 	= "SELECT film_le_cover FROM film_le WHERE film_le_id = '".$filmID."'";
		}
	
		elseif(isset($_REQUEST['filmBoID'])){
			$filmID = $_REQUEST['filmBoID'];
			$film 	= "film_bo_";
			$query 	= "SELECT film_bo_cover FROM film_bo WHERE film_bo_id = '".$filmID."'";
		}
		$result_filmPlay	= mysql_query($query, $my_connect);
		$row_filmPlay		= mysql_fetch_array($result_filmPlay);
		//Hiển thị hình cover vào slider của website
		echo '<img class="cover" src="admin/upload/hinhPhimCover/'.$row_filmPlay[''.$film.'cover'].'">';
	}
	elseif(isset($_REQUEST['filmPlay'])){
		if(isset($_REQUEST['filmLeID'])){
			$filmID	= $_REQUEST['filmLeID'];
			$film 	= "film_le_";
			$query_linkFilm	= "SELECT film_le_link FROM film_le WHERE film_le_id = '".$filmID."'";
		}
	
		elseif(isset($_REQUEST['filmBoID'])){
			$ep 	= $_REQUEST['ep'];
			$filmID = $_REQUEST['filmBoID'];
			$film 	= "film_bo_";
			$query_linkFilm = "SELECT film_bo_ct_link FROM film_bo_ct WHERE film_bo_ct_id = '".$filmID."' AND film_bo_ct_tap = '".$ep."'";
		}
		
		$result = mysql_query($query_linkFilm, $my_connect);
		$row = mysql_fetch_array($result);
		$link = $row[0];
		echo '<video width="100%" height="100%" controls>
  				<source src="admin/upload/'.$link.'" type="video/mp4">
				 Browser của mày không support HTML5.
			   </video>';
	}
	else{
		//Chọn ra top 5 phim lẻ mới nhất lấy cover để chạy slider
		$query = "SELECT * from film_le LIMIT 5";
		$result = mysql_query($query, $my_connect);
		while($row = mysql_fetch_array($result)){
			$resultsCV[] = $row;
		}
?>

<!-- Start WOWSlider.com HEAD section -->

	<div id="wowslider-container1">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
		  </ol>
		
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		  	<?php
		  		if(isset($resultsCV)){
		  			foreach ($resultsCV as $rs) {
						echo '<div class="item">';
						echo '<img src="admin/upload/hinhPhimCover/'.$rs[11].'" alt="'.$rs[1].'">';
						echo '<div class="carousel-caption">';
						echo '<h3>'.$rs[1].'</h3>';
						echo '<p>'.$rs[2].' - '.$rs[4].'</p>';
						echo '</div>';
						echo '</div>';
					  }
		  		}
		  	?>
		    
		  </div>
		
		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div>

		
		
		
		<!-- <div class="ws_images">
			<ul>
				<li>
					<a href="abc"><img src="slider/images/3396181920x1080.jpg" alt="Lamborghini" title="Lamborghini" id="wows1_0"/></a>Aventure
				</li>
				<li>
					<a href="avc"><img src="slider/images/5068691680x1050.jpg" alt="Bugeti veron" title="Bugeti veron" id="wows1_1"/></a>Bugeti veron superCar
				</li>
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
				<a href="#" title="Lamborghini"><img src="slider/images/tooltips/3396181920x1080.jpg" alt="Lamborghini"/>1</a>
				<a href="#" title="Bugeti veron"><img src="slider/images/5068691680x1050.jpg" alt="Bugeti veron"/>2</a>
			</div>
		</div>
		<span class="wsl"><a href="http://wowslider.com">HTML5 Slide Show</a> by WOWSlider.com v4.7</span>
		<div class="ws_shadow"></div>
		<script type="text/javascript" src="slider/js/wowslider.js"></script>
		<script type="text/javascript" src="slider/js/script.js"></script> -->
	</div>

<?php } ?>


