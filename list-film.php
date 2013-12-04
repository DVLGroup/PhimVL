<?php
	include 'core/Connect.php';
	
	function Pagination($page, $totalPage, $self){
		if($totalPage == 1){}else{
					echo '<div align="center">';
					echo '<ul class="pagination">';
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
					echo '</ul>';
					echo '</div>';
				}
	
	}
	
	
	
	$limit	= 30;	//Giới hạn số phim hiển thị
	$title	= null; //Tiêu đề list phim
	$query	= null; //Câu lệnh sql
	$result = null;
	$filmID = null;
	$film	= null;
	$filmParName = null;
	
	if(isset($_REQUEST['dsPhimLe'])){
		//$query 	= "SELECT * FROM film_le LIMIT $limit";
		$title 	= "Danh sách phim lẻ";
		$filmID = $_REQUEST['dsPhimLe'];
		$film	= "film_le";
		$filmParName = "filmLeID";
		$self = $_SERVER['PHP_SELF']."?dsPhimLe";
	}
	elseif(isset($_REQUEST['dsPhimBo'])){
		//$query 	= "SELECT * FROM film_bo LIMIT $limit";
		$title 	= "Danh sách phim bộ";
		$filmID = $_REQUEST['dsPhimBo'];
		$film	= "film_bo";
		$filmParName = "filmBoID";
		$self = $_SERVER['PHP_SELF']."?dsPhimBo";
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
	
	$page 		= 1;
	$perPage	= 12;	// Elements on per page
	
	$start		= 0;		//Oder number of first element on this page
	
	$sql_totalPage = "SELECT COUNT(*) FROM $film";
	$rs = mysql_query($sql_totalPage);
	$rw = mysql_fetch_array($rs);
	$totalPage = ceil($rw[0]/$perPage);
	
	if(isset($_REQUEST['page'])){
		$page = $_REQUEST['page'];
	}
	
	if($page > 1){
		$start	= ($page - 1) * $perPage;
	}
	
	$query 	= "SELECT * FROM ".rtrim($film,'_')." LIMIT $start, $perPage";
?>
				<?php
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result)){
						echo '<li class="list-flim-li-22">';
						echo 	'<a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'"> <img class="poster" src="admin/upload/hinhPhimAvatar/'.$row[''.$film.'_avatar'].'" alt="'.$row[2].' - '.$row[1].' - '.$row[3].'" /> </a>';
						echo 	'<div class="name">';
						echo 		'<span class="name_vi"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name_vi'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span class="name_en"> <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_name'].'</a> </span>';
						echo 		'<br>';
						echo 		'<span > <a href="index.php?'.$filmParName.'='.$row[''.$film.'_id'].'">'.$row[''.$film.'_namsx'].'</a> </span>';
						echo 	'</div>';
						echo '</li>';
					}
					mysql_free_result($result);
				?>

			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="list-film-footer"></div>	
		
		
<!--PHAN TRANG -->
			<?php
				Pagination($page, $totalPage, $self);
			?>
			
			
	</div>
	
	
	<?php /* Cột slider bar */
	
		include 'slider-bar.php';
	?>	
				
</div>
<div class="clearfix"></div>


<?php	mysql_close($my_connect); ?>