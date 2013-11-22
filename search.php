
<?php
	include 'core/Connect.php';
	
	//echo '<li class="rs_filmLe">Danh sách phim lẻ';
	//echo	'<ul>';	
		$html_filmLe	=	'<li>';
		$html_filmLe	.= 	'<div class="media">';
		$html_filmLe	.= 	'<a href=urlString_filmLe>';
		$html_filmLe 	.= 	'<img class="media-object" src="imgSrc_filmLe" />';
		$html_filmLe 	.=	'<div class="media-body">';
		$html_filmLe 	.= 	'<span class="media-heading">nameString_filmLe</span>';
		$html_filmLe 	.=	'</div>';
		$html_filmLe	.= 	'</a>';
		$html_filmLe 	.=	'</div>';
		$html_filmLe	.=	'</li>';
	//echo	'</ul>';
	//echo '</li>';
	
	//echo '<li class="rs_filmBo">Danh sách phim bộ';
	//echo	'<ul>';
		$html_filmBo	=	'<li>';
		$html_filmBo	.= 	'<div class="media">';
		$html_filmBo	.= 	'<a href=urlString_filmBo>';
		$html_filmBo 	.= 	'<img class="media-object" src="imgSrc_filmBo" />';
		$html_filmBo 	.=	'<div class="media-body">';
		$html_filmBo 	.= 	'<span class="media-heading">nameString_filmBo</span>';
		$html_filmBo 	.=	'</div>';
		$html_filmBo	.= 	'</a>';
		$html_filmBo 	.=	'</div>';
		$html_filmBo	.=	'</li>';
	//echo	'</ul>';
	//echo '</li>';
	

	$tu_khoa = $_REQUEST['tu_khoa'];
	
	//Câu query liệt kê những film có tên tiếng anh và tên tiếng việt giống từ khóa
	$sql_Search_filmBo = 'SELECT * FROM film_bo WHERE film_bo_name LIKE "%'.$tu_khoa.'%" OR film_bo_name_vi LIKE "%'.$tu_khoa.'%" LIMIT 5';
	$sql_Search_filmLe = 'SELECT * FROM film_le WHERE film_le_name LIKE "%'.$tu_khoa.'%" OR film_le_name_vi LIKE "%'.$tu_khoa.'%" LIMIT 5';
	
	$rs_filmBo = mysql_query($sql_Search_filmBo, $my_connect);
	$rs_filmLe = mysql_query($sql_Search_filmLe, $my_connect);
	
	//Nạp danh sách kết quả film bộ vào $results_filmBo
	while($rw_filmBo = mysql_fetch_array($rs_filmBo)){
		$results_filmBo[] = $rw_filmBo;
	}
	mysql_free_result($rs_filmBo);
	
	//Nạp danh sách kết quả film lẻ vào $results_filmLe
	while ($rw_filmLe = mysql_fetch_array($rs_filmLe)) {
		$results_filmLe[] = $rw_filmLe;
	}
	mysql_free_result($rs_filmLe);
	
	//Check
	if(isset($results_filmBo) AND isset($results_filmLe)){
		
		//Print danh sách phim bộ
		echo '<li class="rs_filmLe">Danh sách phim bộ:';
		echo	'<ul>';
		foreach ($results_filmBo as $rs) {
			$display_img = $rs['film_bo_avatar'];
			$display_url = 'index.php?filmBoID='.$rs['film_bo_id'];
			$display_name = $rs['film_bo_name'].' - ' .$rs['film_bo_name_vi'].' - ' .$rs['film_bo_namsx'];
			
			
			$output	= str_replace("imgSrc_filmBo", $display_img, $html_filmBo);
			$output = str_replace("urlString_filmBo", $display_url, $output);
			$output = str_replace("nameString_filmBo", $display_name, $output);
			
			echo $output;
		}
		echo	'</ul>';
		echo '</li>';
		
		//Print danh sách phim lẻ
		echo '<li><i class="tt">Danh sách phim lẻ:</i>';
		echo	'<ul class="list-unstyled">';
		foreach ($results_filmLe as $rs) {
			$display_img = $rs['film_le_avatar'];
			$display_url = 'index.php?filmLeID='.$rs['film_le_id'];
			$display_name = $rs['film_le_name'].' - ' .$rs['film_le_name_vi'].' - ' .$rs['film_le_namsx'];
			
			$output	= str_replace("imgSrc_filmLe", $display_img, $html_filmLe);
			$output = str_replace("urlString_filmLe", $display_url, $output);
			$output = str_replace("nameString_filmLe", $display_name, $output);
			
			echo $output;
		}
		echo	'</ul>';
		echo '</li>';
	}
	
	
	elseif(isset($results_filmBo)){
		//Print danh sách phim bộ
		echo '<li><i class="tt">Danh sách phim bộ:</i>';
		echo	'<ul class="list-unstyled">';
		foreach ($results_filmBo as $rs) {
			$display_img = $rs['film_bo_avatar'];
			$display_url = 'index.php?filmBoID='.$rs['film_bo_id'];
			$display_name = $rs['film_bo_name'].' - ' .$rs['film_bo_name_vi'].' - ' .$rs['film_bo_namsx'];
			
			
			$output	= str_replace("imgSrc_filmBo", $display_img, $html_filmBo);
			$output = str_replace("urlString_filmBo", $display_url, $output);
			$output = str_replace("nameString_filmBo", $display_name, $output);
			
			echo $output;
		}
		echo	'</ul>';
		echo '</li>';
		
		//Print danh sách phim lẻ
		echo '<li><i class="tt">Danh sách phim lẻ:</i>';
		echo	'<ul>';
		echo 	'Không có kết quả';
		echo	'</ul>';
		echo '</li>';
	}
	elseif (isset($results_filmLe)) {
		//Print danh sách phim bộ
		echo '<li><i class="tt">Danh sách phim bộ:</i>';
		echo	'<ul>';
		echo 	'Không có kết quả';
		echo	'</ul>';
		echo '</li>';
		
		//Print danh sách phim lẻ
		echo '<li><i class="tt">Danh sách phim lẻ:</i>';
		echo	'<ul>';
		foreach ($results_filmLe as $rs) {
			$display_img = $rs['film_le_avatar'];
			$display_url = 'index.php?filmLeID='.$rs['film_le_id'];
			$display_name = $rs['film_le_name'].' - ' .$rs['film_le_name_vi'].' - ' .$rs['film_le_namsx'];
			
			$output	= str_replace("imgSrc_filmLe", $display_img, $html_filmLe);
			$output = str_replace("urlString_filmLe", $display_url, $output);
			$output = str_replace("nameString_filmLe", $display_name, $output);
			
			echo $output;
		}
		echo	'</ul>';
		echo '</li>';
		
	}
	else{
		echo 'No result found! Please try again!';
	}
	mysql_close($my_connect);
?>