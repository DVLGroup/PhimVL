<?php
$queryReport = "SELECT `film_yeucau_name`,`film_yeucau_name_vi`,count(`film_yeucau_name`) as soLanYeuCau FROM `film_yeucau` 
				GROUP BY `film_yeucau_name` order by soLanYeuCau desc";
$resultReport = mysql_query($queryReport);

mysql_close($link);
?>
<h1 class="text-primary">Thống Kê Số Lượt Yêu Cầu Phim</h1>
<div class="btn-group">
	<a href="index-admin.php?changePage=6" class="btn btn-info">Trở Về</a>
</div>
<div class="btn-group">
	<a href="index-admin.php?changePage=10" class="btn btn-default">Làm Tươi Trang</a>
</div>
<hr id="Three" />
<div class="table-responsive">
	<table id="tableThree" class="table table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th class="lead">STT</th>
				<th class="lead">Tên Phim</th>
				<th class="lead">Tên Tiếng Việt</th>
				<th class="lead">Số Lần Yêu Cầu</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			if($resultReport){
				while($row = mysql_fetch_array($resultReport)){
			?>
			<tr>
				<td><?php echo($i++); ?></td>
				<td><?php echo($row['0']); ?></td>
				<td><?php echo($row['1']); ?></td>
				<td><?php echo('<h4><strong class="text-danger">'.$row['2'].'</strong></h4>'); ?></td>
			</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>
</div>
<hr />
