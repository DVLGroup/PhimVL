<!--@ NOI DUNG HIEN THI-->
<?php 
	include 'core/Connect.php'; 
	
	$limit 	= 30;
	$film	= null;	//film_le_ hoặc film_bo_ 
	//$query_dsPhimRap	= "SELECT * FROM film_rap LIMIT $limit";
	$query_dsPhimBo		= "SELECT * FROM film_bo LIMIT $limit";
	$query_dsPhimLe		= "SELECT * FROM film_le LIMIT $limit";
	
	//$result_dsPhimRap 	= mysql_query($query_dsPhimRap, $my_connect);
	$result_dsPhimBo 	= mysql_query($query_dsPhimBo, $my_connect);
	$result_dsPhimLe 	= mysql_query($query_dsPhimLe, $my_connect);
	
	
	
?>

<div class="list-film">
	<div class="list-film-header">
		<p class="title">
			PHIM CHIẾU RẠP
		</p>
	</div>
	<div class="list-film-body">
		<ul class="film-show-list-ul list-unstyled " style="font-size: 14px">
			<?php
					$film = "film_rap_";
					while($row = mysql_fetch_array($result_dsPhimRap)){
						echo '<li>';
					echo 	'<a href="index.php?filmRapID='.$row[''.$film.'id'].'"> <img class="poster" src="'.$row[''.$film.'avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
					echo 	'<div class="name">';
					echo 		'<span class="name_vi"> <a href="index.php?filmRapID='.$row[''.$film.'id'].'">'.$row[''.$film.'name_vi'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span class="name_en"> <a href="index.php?filmRapID='.$row[''.$film.'id'].'">'.$row[''.$film.'name'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span > <a href="index.php?filmRapID='.$row[''.$film.'id'].'">'.$row[''.$film.'namsx'].'</a> </span>';
					echo 	'</div>';
					echo '</li>';
					}
			?>
			<div class="clearfix"></div>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="list-film-footer">
		<div class="devider"></div>
	</div>
</div>
<div class="clearfix"></div>


<div class="list-film">
	<div class="list-film-header">
		<p class="title">
			PHIM LẺ MỚI
		</p>
	</div>
	<div class="list-film-body">
		<ul class="film-show-list-ul list-unstyled " style="font-size: 14px">
			<?php
				$film = "film_le_";
				while ($row = mysql_fetch_array($result_dsPhimLe)) {
					echo '<li>';
					echo 	'<a href="index.php?filmLeID='.$row[''.$film.'id'].'"> <img class="poster" src="'.$row[''.$film.'avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
					echo 	'<div class="name">';
					echo 		'<span class="name_vi"> <a href="index.php?filmLeID='.$row[''.$film.'id'].'">'.$row[''.$film.'name_vi'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span class="name_en"> <a href="index.php?filmLeID='.$row[''.$film.'id'].'">'.$row[''.$film.'name'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span > <a href="index.php?filmLeID='.$row[''.$film.'id'].'">'.$row[''.$film.'namsx'].'</a> </span>';
					echo 	'</div>';
					echo '</li>';
				}
			?>
			<div class="clearfix"></div>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="list-film-footer">
		<div class="devider"></div>
	</div>
</div>
<div class="clearfix"></div>



<div class="list-film">
	<div class="list-film-header">
		<p class="title">
			PHIM BỘ MỚI
		</p>
	</div>
	<div class="list-film-body">
		<ul class="film-show-list-ul list-unstyled " style="font-size: 14px">
			<?php
				$film = "film_bo_";
				while ($row = mysql_fetch_array($result_dsPhimBo)) {
					echo '<li>';
					echo 	'<a href="index.php?filmBoID='.$row[''.$film.'id'].'"> <img class="poster" src="'.$row[''.$film.'avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
					echo 	'<div class="name">';
					echo 		'<span class="name_vi"> <a href="index.php?filmBoID='.$row[''.$film.'id'].'">'.$row[''.$film.'name_vi'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span class="name_en"> <a href="index.php?filmBoID='.$row[''.$film.'id'].'">'.$row[''.$film.'name'].'</a> </span>';
					echo 		'<br>';
					echo 		'<span > <a href="index.php?filmBoID='.$row[''.$film.'id'].'">'.$row[''.$film.'namsx'].'</a> </span>';
					echo 	'</div>';
					echo '</li>';
				}
			?>
			
			<div class="clearfix"></div>
		</ul>
	</div>
	
	<div class="list-film-footer">
		<div class="divider"></div>
	</div>
</div>
<div class="clearfix"></div>
<!--@@ END NOI DUNG HIEN THI-->



<?php 
	//mysql_free_result($result_dsPhimRap);
	mysql_free_result($result_dsPhimLe);
	mysql_free_result($result_dsPhimBo);
	
	mysql_close($my_connect);	
?>

