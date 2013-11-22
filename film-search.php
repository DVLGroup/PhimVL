<?php
    include 'core/Connect.php';
	
	if(isset($_REQUEST['searchFilm'])){
		//Tiếp nhận từ khóa tìm kiếm
		$string_search = $_REQUEST['string_search'];
		//Tạo câu lệnh truy vấn tìm kiếm
		$query_searchFilmLe = "SELECT * FROM film_le WHERE film_le_name = $string_search OR film_le_name_vi = $string_search LIMIT 30";
		$query_searchFilmBo = "SELECT * FROM film_le WHERE film_bo_name = $string_search OR film_bo_name_vi = $string_search LIMIT 30";
		//Thực hiện câu truy vấn
		$rs_searchFilmLe = mysql_query($query_searchFilmLe, $my_connect);
		$rs_searchFilmBo = mysql_query($query_searchFilmBo, $my_connect);
		//Lấy danh sách kết quả truy vấn gán vào mảng
		//và giải phóng vùng nhớ 
		while($rw = mysql_fetch_array($rs_searchFilmLe)){
			$results_searchFilmLe[] = $rw;
		}
		mysql_free_result($rs_searchFilmLe);
		while($rw = mysql_fetch_array($rs_searchFilmLe)){
			$results_searchFilmBo[] = $rw;
		}
		mysql_free_result($rs_searchFilmBo);
		//Kiểm tra rỗng?
		if(isset($results_searchFilmLe) && isset($results_searchFilmBo))
		//Liệt kê danh sách ra màn hình
		
	}
	else {
		
	}
?>