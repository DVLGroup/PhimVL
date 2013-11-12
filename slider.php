
<?php
	include 'core/Connect.php';
	
	$img;
	$filmID = null;
	$sql = "";
	
	$link = null;
	
	if((isset($_REQUEST['filmLeID']) OR (isset($_REQUEST['filmBoID'])) AND !isset($_REQUEST['filmPlay']))){
		if(isset($_REQUEST['filmLeID'])){
			$img = "film_le_cover";
			$filmID = $_REQUEST['filmLeID'];
			$sql = "SELECT film_le_cover FROM film_le WHERE film_le_id = '".$filmID."'";
		}
	
		elseif(isset($_REQUEST['filmBoID'])){
			$img = "film_bo_cover";
			$filmID = $_REQUEST['filmBoID'];
			$sql = "SELECT film_bo_cover FROM film_bo WHERE film_bo_id = '".$filmID."'";
		}
		$result = mysql_query($sql, $my_connect);
		$row = mysql_fetch_array($result);
		echo '<img class="cover" src="'.$row[$img].'">';
		
	}
	elseif(isset($_REQUEST['filmPlay'])){
		if(isset($_REQUEST['filmLeID'])){
			$filmID = $_REQUEST['filmLeID'];
			$sql = "SELECT film_le_link FROM film_le WHERE film_le_id = '".$filmID."'";
		}
	
		elseif(isset($_REQUEST['filmBoID'])){
			$ep = $_REQUEST['ep'];
			$filmID = $_REQUEST['filmBoID'];
			$sql = "SELECT film_bo_ct_link FROM film_bo_ct WHERE film_bo_ct_id = '".$filmID."' AND film_bo_ct_tap = '".$ep."'";
		}
		
		$result = mysql_query($sql, $my_connect);
		$row = mysql_fetch_array($result);
		$link = $row[0];
		echo $link;
	}
	else{
?>

<!-- Start WOWSlider.com HEAD section -->

	<div id="wowslider-container1">
		<div class="ws_images">
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
		<script type="text/javascript" src="slider/js/script.js"></script>
	</div>

<?php } ?>


